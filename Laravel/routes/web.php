<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function() {
    if (Auth::check()) {
        // return to_route('dashboard.index');
    } else {
        return view('auth.login');
    }
});

Route::controller(LoginController::class)
    ->middleware('guest')
    ->group(function () {
        Route::post('/login', 'authenticate')->name('login');
    });

