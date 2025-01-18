<?php

namespace App\Exports;

use App\Models\Pegawai;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class GajiExport implements FromView
{
    public function view(): View
    {
        return view('export_gaji', [
            'pegawai' => Pegawai::all()
        ]);
    }
}
