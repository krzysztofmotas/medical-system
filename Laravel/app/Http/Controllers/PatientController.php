<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    public function prescriptions()
    {
        $user = Auth::user();
        $prescriptions = executeFunctionWithCursor('GET_PATIENT_PRESCRIPTIONS', [$user->table_id]);

        foreach ($prescriptions as &$prescription) {
            $medicines = executeFunctionWithCursor('GET_PRESCRIPTION_MEDICINES', [$prescription['ID']]);
            $prescription['medicines'] = $medicines;
        }

        return view('patient.components.prescriptions', compact('prescriptions'));
    }

    public function visits()
    {
        $user = Auth::user();
        $visits = executeFunctionWithCursor('GET_PATIENT_VISITS', [$user->table_id]);

        return view('patient.components.visits', compact('visits'));
    }

    public function settings()
    {
        $userId = Auth::user()->table_id;
        $patient = DB::table('patients')
            ->where('id', '=', $userId)
            ->first();

        return view('patient.components.settings', compact('patient'));
    }

    public function updateSettings(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'gender' => 'required|in:Mężczyzna,Kobieta,Inna',
            'address' => 'required|string|max:100',
            'phone_number' => 'required|string|max:15',
            'date_of_birth' => 'required|date'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $request->input('name');
        $last_name = $request->input('last_name');

        /** @var \App\Models\User $user **/
        $user = Auth::user();
        $searchPatientId = getPatientId($name, $last_name);

        if ($searchPatientId && $searchPatientId != $user->table_id) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'W naszej placówce istnieje już pacjent o takim imieniu i nazwisku.');
        }

        DB::statement("CALL UPDATE_PATIENT(?, ?, ?, ?, ?, ?, TO_DATE(?, 'YYYY-MM-DD'))", [
            $user->table_id,
            $name,
            $last_name,
            $request->input('gender'),
            $request->input('address'),
            $request->input('phone_number'),
            $request->input('date_of_birth')
        ]);

        $user->name = $name;
        $user->last_name = $last_name;
        $user->save();

        return to_route('dashboard.index')
            ->with('success', 'Twoje dane zostały pomyślnie zaaktualizowane!');
    }
}
