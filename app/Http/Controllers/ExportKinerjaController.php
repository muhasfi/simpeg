<?php

namespace App\Http\Controllers;

use App\Exports\PenilaianPegawaiExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class PenilaianKinerjaController extends Controller
{
    // Other methods...

    /**
     * Export the employee evaluations.
     *
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new PenilaianPegawaiExport, 'penilaian_pegawai.xlsx');
    }
}
