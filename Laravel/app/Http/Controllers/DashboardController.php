<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return view('auth.login');
        }

        if ($user->is_doctor) {
            return view('doctor.index');
        } else {
            return view('patient.index');
        }
    }
}
