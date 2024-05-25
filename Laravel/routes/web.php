<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;

Route::controller(DashboardController::class)
    ->group(function () {
        Route::get('/', 'index')->name('dashboard.index');
    });

Route::controller(DoctorController::class)
    ->group(function () {
        Route::get('/expensive-medicines', 'expensiveMedicines')->name('doctor.expensive.medicines');
    });

Route::controller(LoginController::class)
    ->group(function () {
        Route::post('/login', 'authenticate')->middleware('guest')->name('login');
        Route::get('/logout', 'logout')->middleware('auth')->name('logout');
    });

