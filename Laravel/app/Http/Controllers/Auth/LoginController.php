<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $request->input('name');
        $last_name = $request->input('last_name');
        $is_doctor = $request->input('is_doctor');

        $isLoggedIn = false;

        if ($is_doctor) {
            $isLoggedIn = $this->loginDoctor($name, $last_name);
        } else {
            $isLoggedIn = $this->loginPatient($name, $last_name);
        }

        if ($isLoggedIn) {
            $user = new User();
            $user->name = $name;
            $user->last_name = $last_name;
            $user->is_doctor = $is_doctor;
            $user->table_id = $this->getUserTableId($user);

            Auth::login($user);

            // return to_route('dashboard.index');
        } else {
            return redirect()->back()->with('error', 'Nieprawidłowe dane logowania.');
        }
    }

    private function getUserTableId(User $user)
    {
        $result = DB::table($user->is_doctor ? 'doctors' : 'patients')
            ->select('id')
            ->where('name', $user->name)
            ->where('last_name', $user->last_name)
            ->first();

        if ($result) {
            return $result->id;
        }

        return null;
    }

    private function loginDoctor($name, $last_name)
    {
        $query = "SELECT LOGIN_DOCTOR(:name, :last_name) AS result FROM DUAL";

        $bindings = [
            ':name' => $name,
            ':last_name' => $last_name,
        ];

        $result = DB::connection()->selectOne($query, $bindings);

        return $result->result;
    }

    private function loginPatient($name, $last_name)
    {
        $query = "SELECT LOGIN_PATIENT(:name, :last_name) AS result FROM DUAL";

        $bindings = [
            ':name' => $name,
            ':last_name' => $last_name,
        ];

        $result = DB::connection()->selectOne($query, $bindings);

        return $result->result;
    }
}
