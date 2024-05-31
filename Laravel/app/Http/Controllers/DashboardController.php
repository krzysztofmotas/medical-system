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
            $averageMedicinePrice = self::calculateAverageMedicinePrice(); // TODO: przekazywane, ale nieobsługiwane w żaden sposób

            return view('doctor.index', compact(
                'averageMedicinePrice'
            ));
        } else {
            return view('patient.index');
        }
    }

    function calculateAverageMedicinePrice()
    {
        $result = DB::selectOne("SELECT CALCULATE_AVERAGE_MEDICINE_PRICE() AS average_price FROM DUAL");
        $averagePrice = $result->average_price;

        return $averagePrice;
    }
}
