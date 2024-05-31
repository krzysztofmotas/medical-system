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
        Route::get('/doctors', 'doctors')->name('doctor.doctors');
        Route::get('/all-patients', 'allPatients')->name('doctor.all-patients');
        Route::get('/visits/create', 'createVisit')->name('doctor.create.visit');
        Route::get('/visits/manage', 'manageVisits')->name('doctor.manage.visits');
        Route::get('/visits/edit/{id}', 'editVisit')->name('doctor.edit.visit');
        Route::delete('/visits/delete/{id}', 'deleteVisit')->name('doctor.delete.visit');
        Route::post('/visits/store', 'storeVisit')->name('doctor.store.visit');
        Route::get('/specialization-popularity', 'specializationPopularity')->name('doctor.specialization.popularity');
        Route::get('/doctor-patient-count-report', 'doctorPatientCountReport')->name('doctor.patient.count.report');
        Route::get('/visits', 'visits')->name('doctor.visits');
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

