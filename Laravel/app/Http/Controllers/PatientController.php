<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
}
