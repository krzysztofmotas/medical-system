<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class DoctorController extends Controller
{
    public function expensiveMedicines()
    {
        $medicines = self::executeFunctionWithCursor('SEARCH_EXPENSIVE_MEDICINES');
        return view('doctor.components.expensive-medicines', compact('medicines'));
    }

    public function doctors(Request $request)
    {
        $specialization = $request->input('specialization');

        if ($specialization) {
            $doctors = self::executeFunctionWithCursor('SEARCH_DOCTORS_BY_SPECIALIZATION', [$specialization]);
        } else {
            $doctors = self::executeFunctionWithCursor('GET_ALL_DOCTORS');
        }

        return view('doctor.components.doctors', compact('doctors'));
    }

    public function doctorPatientCountReport()
    {
        $report = self::executeFunctionWithCursor('GENERATE_DOCTOR_PATIENT_COUNT_REPORT');
        return view('doctor.components.doctor-patient-count-report', compact('report'));
    }

    public function allPatients()
    {
        $patients = self::executeFunctionWithCursor('GET_ALL_PATIENTS');
        return view('doctor.components.all-patients', compact('patients'));
    }

    public function visits(Request $request)
    {
        $lastName = $request->input('last_name');

        if ($lastName) {
            $visits = self::executeFunctionWithCursor('SEARCH_VISITS_BY_PATIENT_LAST_NAME', [$lastName]);
        } else {
            $visits = self::executeFunctionWithCursor('GET_ALL_VISITS');
        }

        return view('doctor.components.visits', compact('visits', 'lastName'));
    }

    private function executeFunctionWithCursor($procedureName, $params = [])
    {
        $conn = DB::getPdo()->getResource();
        $sql = "BEGIN :result := $procedureName(";
        $placeholders = [];

        foreach ($params as $index => $param) {
            $placeholders[] = ":param$index";
        }

        $sql .= implode(', ', $placeholders) . "); END;";
        $stmt = oci_parse($conn, $sql);
        $cursor = oci_new_cursor($conn);

        oci_bind_by_name($stmt, ':result', $cursor, -1, OCI_B_CURSOR);

        foreach ($params as $index => $param) {
            oci_bind_by_name($stmt, ":param$index", $params[$index]);
        }

        oci_execute($stmt);
        oci_execute($cursor, OCI_DEFAULT);
        oci_fetch_all($cursor, $results, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);

        oci_free_statement($stmt);
        oci_free_statement($cursor);
        oci_close($conn);

        return $results;
    }

    public function createVisit()
    {
        $medicines = self::executeFunctionWithCursor('GET_ALL_MEDICINES');
        $currentDateTime = self::getDateTime();

        return view('doctor.components.create-visit', compact(
            'medicines',
            'currentDateTime'
        ));
    }

    function getPatientId($firstName, $lastName)
    {
        $result = DB::select('SELECT GET_PATIENT_ID(:first_name, :last_name) AS patient_id FROM dual', [
            'first_name' => $firstName,
            'last_name' => $lastName,
        ]);

        return $result[0]->patient_id ?? null;
    }

    function getDateTime($addYears = 0)
    {
        $dateTime = Carbon::now();

        if ($addYears != 0) {
            $dateTime->addYears($addYears);
        }

        return $dateTime->format('Y-m-d H:i:s');
    }

    public function storeVisit(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'reason' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',

            'diagnosis' => 'required|string',
            'treatment_method' => 'required|string',
        ]);

        $medicines = json_decode($request->medicines, true);

        if ($medicines && count($medicines) > 0) {
            $rules = [
                'medicines' => 'required|array',
                'medicines.*.id' => 'integer',
                'medicines.*.dosage' => 'string',
                'medicines.*.payment' => 'numeric',
            ];

            $validator = Validator::make(['medicines' => $medicines], $rules);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                return redirect()->back()->withInput()->with('medicines_errors', $errors);
            }
        }
        $patientId = self::getPatientId($validatedData['first_name'], $validatedData['last_name']);

        if (!$patientId) {
            return back()->withInput()->withErrors(['last_name' => 'Pacjent o podanym imieniu i nazwisku nie został znaleziony.']);
        }

        DB::beginTransaction();

        try {
            $user = Auth::user();
            $doctorId = $user->table_id;

            DB::statement("CALL ADD_VISIT(?, ?, ?, TO_TIMESTAMP(?, 'YYYY-MM-DD HH24:MI:SS'), TO_TIMESTAMP(?, 'YYYY-MM-DD HH24:MI:SS'))", [
                $patientId,
                $doctorId,
                $validatedData['reason'],
                str_replace('T', ' ', $validatedData['start_date']),
                str_replace('T', ' ', $validatedData['end_date'] ?? self::getDateTime())
            ]);

            $visitId = DB::table('VISITS')->max('ID');

            DB::statement("CALL ADD_DOCUMENTATION(?, CURRENT_TIMESTAMP, ?, ?)", [
                $visitId,
                $validatedData['diagnosis'],
                $validatedData['treatment_method'],
            ]);

            if ($medicines && count($medicines) > 0) {
                DB::statement("CALL ADD_PRESCRIPTION(?, TO_TIMESTAMP(?, 'YYYY-MM-DD HH24:MI:SS'))", [
                    $visitId,
                    str_replace('T', ' ', $request->input('expiration_date') ?? self::getDateTime(1)) // addYears = 1
                ]);

                $prescriptionId = DB::table('PRESCRIPTIONS')->max('ID');

                foreach ($medicines as $medicineData) {
                    DB::statement("CALL ADD_PRESCRIPTION_MEDICINE(?, ?, ?, ?)", [
                        $prescriptionId,
                        $medicineData['id'],
                        $medicineData['dosage'],
                        $medicineData['payment'],
                    ]);
                }
            }
            DB::commit();

            return to_route('doctor.manage.visits')->with('success', 'Wizyta została pomyślnie dodana.');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function specializationPopularity()
    {
        $popularityData = self::executeFunctionWithCursor('GENERATE_VISIT_COUNT_BY_SPECIALIZATION_REPORT');
        return view('doctor.components.specialization-popularity', compact('popularityData'));
    }

    public function manageVisits()
    {
        $user = Auth::user();
        $visits = self::executeFunctionWithCursor('GET_DOCTOR_VISITS', [$user->table_id]);

        return view('doctor.components.manage-visits', compact('visits'));
    }

    public function deleteVisit($visitId)
    {
        try {
            DB::transaction(function () use ($visitId) {
                DB::statement("CALL DELETE_VISIT_AND_ASSOCIATED_DATA($visitId)");
            });
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }

        return redirect()
            ->back()
            ->with('success', 'Wizyta została pomyślnie usunięta wraz z powiązanymi danymi.');
    }

    public function editVisit($visitId)
    {
        $visit = DB::table('VISITS')
            ->join('PATIENTS', 'VISITS.PATIENT_ID', '=', 'PATIENTS.ID')
            ->leftJoin('DOCUMENTATIONS', 'VISITS.ID', '=', 'DOCUMENTATIONS.VISIT_ID')
            ->where('VISITS.ID', $visitId)
            ->select(
                'VISITS.ID',
                'VISITS.PATIENT_ID',
                'VISITS.START_DATE',
                'VISITS.END_DATE',
                'VISITS.REASON',
                'PATIENTS.NAME AS PATIENT_NAME',
                'PATIENTS.LAST_NAME AS PATIENT_LAST_NAME',
                'DOCUMENTATIONS.DIAGNOSIS',
                'DOCUMENTATIONS.TREATMENT_METHOD'
            )
            ->first();

        $visit = json_decode(json_encode($visit), true); // Cannot use object of type stdClass as array

        $prescriptionData = DB::table('PRESCRIPTIONS')
            ->where('VISIT_ID', $visitId)
            ->select(
                'ID AS PRESCRIPTION_ID',
                'EXPIRATION_DATE',
                'CODE'
            )
            ->first();

        $prescriptionData = json_decode(json_encode($prescriptionData), true);

        $medicinesData = '';
        if ($prescriptionData) {
            $prescriptionData['expiration_date'] = date('Y-m-d', strtotime($prescriptionData['expiration_date'])); // input oczekuje daty

            $medicinesData = DB::table('PRESCRIPTION_MEDICINES')
                ->join('MEDICINES', 'PRESCRIPTION_MEDICINES.MEDICINE_ID', '=', 'MEDICINES.ID')
                ->where('PRESCRIPTION_ID', $prescriptionData['prescription_id'])
                ->select('PRESCRIPTION_MEDICINES.*', 'MEDICINES.name')
                ->get();

            $medicinesData = json_decode(json_encode($medicinesData), true);
        }

        $medicines = self::executeFunctionWithCursor('GET_ALL_MEDICINES');

        return view('doctor.components.edit-visit', compact(
            'visit',
            'prescriptionData',
            'medicinesData',
            'medicines'
        ));
    }

    public function updateVisit(Request $request, $visitId)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'reason' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',

            'diagnosis' => 'required|string',
            'treatment_method' => 'required|string',
        ]);

        $medicines = json_decode($request->medicines, true);

        if ($medicines && count($medicines) > 0) {
            $rules = [
                'medicines' => 'required|array',
                'medicines.*.medicine_id' => 'integer',
                'medicines.*.dosage' => 'string',
                'medicines.*.payment' => 'numeric',
            ];

            $validator = Validator::make(['medicines' => $medicines], $rules);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                return redirect()->back()->withInput()->with('medicines_errors', $errors);
            }
        }

        DB::beginTransaction();

        try {
            $user = Auth::user();
            $doctorId = $user->table_id;

            DB::statement("CALL UPDATE_VISIT(?, TO_TIMESTAMP(?, 'YYYY-MM-DD HH24:MI:SS'), TO_TIMESTAMP(?, 'YYYY-MM-DD HH24:MI:SS'), ?)", [
                $visitId,
                str_replace('T', ' ', $validatedData['start_date']),
                str_replace('T', ' ', $validatedData['end_date']),
                $validatedData['reason']
            ]);

            DB::statement("CALL UPDATE_DOCUMENTATION(?, ?, ?)", [
                $visitId,
                $validatedData['diagnosis'],
                $validatedData['treatment_method']
            ]);

            $prescription = DB::table('PRESCRIPTIONS')
                ->where('VISIT_ID', $visitId)
                ->select('ID')
                ->first();

            if ($prescription) {
                $prescriptionId = (int) $prescription->id;
            }
            $extraMessage = "";

            if ($medicines && count($medicines) > 0) {
                if (!$prescription) {
                    DB::statement("CALL ADD_PRESCRIPTION(?, TO_TIMESTAMP(?, 'YYYY-MM-DD HH24:MI:SS'))", [
                        $visitId,
                        str_replace('T', ' ', $request->input('expiration_date') ?? self::getDateTime(1)) // addYears = 1, todo
                    ]);

                    $prescriptionId = DB::table('PRESCRIPTIONS')->max('ID');
                } else {
                    DB::statement("CALL UPDATE_PRESCRIPTION(?, ?)", [
                        $prescriptionId,
                        $request->input('expiration_date')
                    ]);
                }

                $deletedCount = 0;

                foreach ($medicines as $medicineData) {
                    if ($medicineData['deleted'] === true) {
                        DB::statement("CALL DELETE_PRESCRIPTION_MEDICINE(?)", [$medicineData['id']]);
                        $deletedCount++;
                    } else {
                        if ($medicineData['id'] === '-') {
                            DB::statement("CALL ADD_PRESCRIPTION_MEDICINE(?, ?, ?, ?)", [
                                $prescriptionId,
                                $medicineData['medicine_id'],
                                $medicineData['dosage'],
                                $medicineData['payment'],
                            ]);
                        } else {
                            DB::statement('CALL UPDATE_PRESCRIPTION_MEDICINE(?, ?, ?)', [
                                $medicineData['id'],
                                $medicineData['dosage'],
                                $medicineData['payment'],
                            ]);
                        }
                    }
                }

                if ($deletedCount == count($medicines)) {
                    DB::statement("CALL DELETE_PRESCRIPTION_MEDICINE_BY_PRESCRIPTION_ID($prescriptionId)");
                    DB::statement("CALL DELETE_PRESCRIPTION($prescriptionId)");

                    $extraMessage = ' Recepta wraz z przypisanymi lekami została usunięta.';
                }
            }
            DB::commit();

            return to_route('doctor.manage.visits')->with('success', 'Wizyta została pomyślnie zaaktualizowana.' . $extraMessage);
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function medicines()
    {
        $medicines = self::executeFunctionWithCursor('GET_ALL_MEDICINES');
        return view('doctor.components.medicines', compact('medicines'));
    }

    public function storeMedicine(Request $request)
    {
        $name = $request->input('name');

        $result = DB::table('medicines')
            ->whereRaw('LOWER(name) = LOWER(?)', [$name])
            ->exists();

        if ($result) {
            return back()->withInput()->with('error', 'Lek o podanej nazwie już istnieje!');
        }

        $price = $request->input('price');
        $medicineId = DB::table('MEDICINES')->max('ID') + 1;

        DB::statement("CALL ADD_MEDICINE(?, ?, ?)", [
            $medicineId,
            $name,
            $price
        ]);

        return to_route('doctor.medicines')
            ->with('success', 'Nowy lek o nazwie ' . $name . ' i cenie ' . $price . ' zł został pomyślnie dodany.');
    }

    private function getDoctorTableId($name, $lastName)
    {
        $result = DB::table('doctors')
            ->select('id')
            ->whereRaw('LOWER(name) = LOWER(?)', [$name])
            ->whereRaw('LOWER(last_name) = LOWER(?)', [$lastName])
            ->first();

        if ($result) {
            return $result->id;
        }

        return null;
    }

    public function topPrescribedMedicines(Request $request)
    {
        $name = $request->input('name');
        $lastName = $request->input('last_name');

        if ($name && $lastName) {
            $doctorId = self::getDoctorTableId($name, $lastName);

            if (!$doctorId) {
                return redirect()
                    ->back()
                    ->with('error', 'Lekarz o takim imieniu i nazwisku nie istnieje!');
            }
        } else {
            $user = Auth::user();
            $doctorId = $user->table_id;

            $name = $user->name;
            $lastName = $user->last_name;
        }
        $medicines = self::executeFunctionWithCursor('SEARCH_TOP_PRESCRIBED_MEDICINES_BY_DOCTOR', [$doctorId]);

        return view('doctor.components.top-prescribed-medicines', compact('medicines', 'name', 'lastName'));
    }

    public function visitsDuration()
    {
        $visitsData = self::executeFunctionWithCursor('CALCULATE_AVERAGE_VISIT_TIME');
        return view('doctor.components.visits-duration', compact('visitsData'));
    }
}
