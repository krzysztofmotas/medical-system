<?php

use App\Http\Controllers\PatientController;
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
        Route::get('/all-doctors', 'allDoctors')->name('doctor.all-doctors');
        Route::get('/all-patients', 'allPatients')->name('doctor.all-patients');
    });

Route::controller(PatientController::class)
    ->group(function () {
        Route::get('/patient/all-doctors', 'allDoctors')->name('patient.all-doctors');
    });

Route::controller(LoginController::class)
    ->group(function () {
        Route::post('/login', 'authenticate')->middleware('guest')->name('login');
        Route::get('/logout', 'logout')->middleware('auth')->name('logout');
    });

