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
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        User::truncate();
        return to_route('dashboard.index');
    }

    function getUserTableId(User $user)
    {
        $result = DB::table($user->is_doctor ? 'doctors' : 'patients')
            ->select('id')
            ->whereRaw('LOWER(name) = LOWER(?)', [$user->name])
            ->whereRaw('LOWER(last_name) = LOWER(?)', [$user->last_name])
            ->first();

        if ($result) {
            return $result->id;
        }

        return null;
    }

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
        $is_doctor = (bool) $request->has('is_doctor');

        $isLoggedIn = $is_doctor ? doctorExists($name, $last_name) : patientExists($name, $last_name);

        if ($isLoggedIn) {
            User::truncate();

            $user = new User();
            $user->name = $name;
            $user->last_name = $last_name;
            $user->is_doctor = $is_doctor;
            $user->table_id = self::getUserTableId($user);
            $user->save();

            Auth::login($user);

            return to_route('dashboard.index')
                ->with('success', 'Zostałeś pomyślnie zalogowany na swoje konto!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Nieprawidłowe dane logowania.');
        }
    }

    public function registerView()
    {
        return view('auth.register');
    }

    public function processRegister(Request $request)
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

        $exists = patientExists($name, $last_name);

        if (!$exists) {
            $result = DB::statement("CALL ADD_PATIENT(?, ?, ?, ?, ?, ?)", [
                $name,
                $last_name,
                $request->input('gender'),
                $request->input('address'),
                $request->input('phone_number'),
                $request->input('date_of_birth')
            ]);

            if (!$result) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Wystąpił błąd i nie mogłeś zostać zarejestrowany.');
            }

            User::truncate();

            $user = new User();
            $user->name = $name;
            $user->last_name = $last_name;
            $user->is_doctor = false;
            $user->table_id = self::getUserTableId($user);
            $user->save();

            Auth::login($user);

            return to_route('dashboard.index')
                ->with('success', 'Zostałeś pomyślnie zarejestrowany w naszej placówce!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'W naszej placówce istnieje już pacjent o takim imieniu i nazwisku.');
        }
    }
}
