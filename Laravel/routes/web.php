<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-oracle-connection', function () {
    try {
        DB::connection('oracle')->getPdo();
        return "Pomyślnie połączono z bazą danych Oracle.";
    } catch (\Exception $e) {
        return "Nie można połączyć się z bazą danych Oracle: " . $e->getMessage();
    }
});
