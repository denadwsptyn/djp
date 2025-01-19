<?php

namespace App\Http\Controllers;

use App\Exports\GajiExport;
use App\Imports\GajiImport;
use App\Models\Gaji;
use App\Models\Pegawai;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GajiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); // Ambil input pencarian
        $pegawai = Pegawai::when($search, function ($query, $search) {
            $query->where('nip', 'like', "%{$search}%")
                ->orWhere('nama', 'like', "%{$search}%");
        })->paginate(10); // Paginate hasil pencarian

        // Return view dengan data hasil pencarian
        return view('SPT.index', compact('pegawai', 'search'));
    }


    public function show(Pegawai $pegawai)
    {
        return view('SPT.show_gaji', compact('pegawai'));
    }

    public function edit(Gaji $gaji)
    {
        return view('SPT.edit_gaji', compact('gaji'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $bulan = $request->month;
        $tahun = $request->year;

        try {
            Excel::import(new GajiImport($bulan, $tahun), $request->file('file'));
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }

        session()->flash('success', "Data bulan $request->month berhasil diimpor!");
        return redirect()->back();
    }

    public function export()
    {
        // $pegawai = Pegawai::paginate(10);
        // return view('export_gaji', compact('pegawai'));

        return Excel::download(new GajiExport, 'Laporan Gaji.xlsx');
    }
}
