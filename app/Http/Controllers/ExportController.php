<?php

namespace App\Http\Controllers;

use App\Exports\PeminjamanExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportexcel()
    {
        return Excel::download(new PeminjamanExport, 'data_peminjaman.xlsx');
    }
}
