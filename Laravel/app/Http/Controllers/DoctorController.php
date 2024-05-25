<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function expensiveMedicines()
    {
        $conn = DB::getPdo()->getResource();

        $sql = "BEGIN :result := SEARCH_EXPENSIVE_MEDICINES; END;";
        $stmt = oci_parse($conn, $sql);

        $cursor = oci_new_cursor($conn);

        oci_bind_by_name($stmt, ':result', $cursor, -1, OCI_B_CURSOR);

        oci_execute($stmt);
        oci_execute($cursor, OCI_DEFAULT);

        oci_fetch_all($cursor, $medicines, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);

        oci_free_statement($stmt);
        oci_free_statement($cursor);
        oci_close($conn);

        return view('doctor.components.expensive-medicines', compact('medicines'));
    }
}
