<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

function formatTimestampToDate($timestamp)
{
    $date = Carbon::parse($timestamp);

    Carbon::setLocale('pl');
    setlocale(LC_TIME, 'pl_PL.UTF-8');

    $formattedDate = $date->translatedFormat('j F Y, H:i');

    return $formattedDate;
}

function formatSecondsToTime($seconds)
{
    return Carbon::createFromTimestamp($seconds)->toTimeString();
}

function getDoctorTableId($name, $lastName)
{
    $result = DB::table('doctors')
        ->select('id')
        ->whereRaw('LOWER(name) = LOWER(?)', [$name])
        ->whereRaw('LOWER(last_name) = LOWER(?)', [$lastName])
        ->first();

    if ($result) {
        return $result->id;
    }

    return null;
}

function getPatientId($firstName, $lastName)
{
    $result = DB::select('SELECT GET_PATIENT_ID(:first_name, :last_name) AS patient_id FROM dual', [
        'first_name' => $firstName,
        'last_name' => $lastName,
    ]);

    return $result[0]->patient_id ?? null;
}

function getDateTime($addYears = 0)
{
    $dateTime = Carbon::now();

    if ($addYears != 0) {
        $dateTime->addYears($addYears);
    }

    return $dateTime->format('Y-m-d H:i:s');
}

function executeFunctionWithCursor($procedureName, $params = [])
{
    $conn = DB::getPdo()->getResource();
    $sql = "BEGIN :result := $procedureName(";
    $placeholders = [];

    foreach ($params as $index => $param) {
        $placeholders[] = ":param$index";
    }

    $sql .= implode(', ', $placeholders) . "); END;";
    $stmt = oci_parse($conn, $sql);
    $cursor = oci_new_cursor($conn);

    oci_bind_by_name($stmt, ':result', $cursor, -1, OCI_B_CURSOR);

    foreach ($params as $index => $param) {
        oci_bind_by_name($stmt, ":param$index", $params[$index]);
    }

    oci_execute($stmt);
    oci_execute($cursor, OCI_DEFAULT);
    oci_fetch_all($cursor, $results, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);

    oci_free_statement($stmt);
    oci_free_statement($cursor);
    oci_close($conn);

    return $results;
}

function doctorExists($name, $last_name)
{
    $query = "SELECT LOGIN_DOCTOR(:name, :last_name) AS result FROM DUAL";

    $bindings = [
        ':name' => $name,
        ':last_name' => $last_name,
    ];

    $result = DB::connection()->selectOne($query, $bindings);

    return $result->result;
}

function patientExists($name, $last_name)
{
    $query = "SELECT LOGIN_PATIENT(:name, :last_name) AS result FROM DUAL";

    $bindings = [
        ':name' => $name,
        ':last_name' => $last_name,
    ];

    $result = DB::connection()->selectOne($query, $bindings);

    return $result->result;
}
