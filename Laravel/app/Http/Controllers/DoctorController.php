<?php

namespace App\Http\Controllers;

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
        $medicines = $this->executeProcedureWithCursor('SEARCH_EXPENSIVE_MEDICINES');
        return view('doctor.components.expensive-medicines', compact('medicines'));
    }

    public function allDoctors()
    {
        $doctors = $this->executeProcedureWithCursor('GET_ALL_DOCTORS');
        return view('doctor.components.all-doctors', compact('doctors'));
    }

    public function allPatients()
    {
        $patients = $this->executeProcedureWithCursor('GET_ALL_PATIENTS');
        return view('doctor.components.all-patients', compact('patients'));
    }

    private function executeProcedureWithCursor($procedureName)
    {
        $conn = DB::getPdo()->getResource();

        $sql = "BEGIN :result := $procedureName; END;";
        $stmt = oci_parse($conn, $sql);

        $cursor = oci_new_cursor($conn);

        oci_bind_by_name($stmt, ':result', $cursor, -1, OCI_B_CURSOR);

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
        $medicines = $this->executeProcedureWithCursor('GET_ALL_MEDICINES');
        $currentDateTime = self::getDateTime();

        return view('doctor.components.create-visit', compact(
            'medicines',
            'currentDateTime'
        ));
    }

    function getPatientId($firstName, $lastName)
    {
        $result = DB::select('SELECT get_patient_id(:first_name, :last_name) AS patient_id FROM dual', [
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

        return Carbon::now()->format('Y-m-d H:i:s');
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

        if (count($medicines) > 0) {
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

            if (count($medicines) > 0) {
                DB::statement("CALL ADD_PRESCRIPTION(?, TO_TIMESTAMP(?, 'YYYY-MM-DD HH24:MI:SS'))", [
                    $visitId,
                    str_replace('T', ' ', $validatedData['expiration_date'] ?? self::getDateTime(1)) // addYears = 1
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

            return to_route('dashboard.index')->with('success', 'Wizyta została pomyślnie dodana.');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
