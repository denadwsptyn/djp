<?php

namespace App\Http\Controllers;

use App\Exports\GajiExport;
use App\Imports\GajiImport;
use App\Models\Gaji;
use App\Models\Opd;
use App\Models\Pegawai;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GajiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $filterYear = $request->input('filterYear');
        $filterOpd = $request->input('filterOpd');

        $pegawai = Pegawai::query()
            ->when($search, function ($query, $search) {
                $query->where('nip', 'like', "%{$search}%")
                    ->orWhere('nama', 'like', "%{$search}%");
            })
            ->when($filterOpd, function ($query, $filterOpd) {
                $query->where('opd_id', $filterOpd);
            })
            ->when($filterYear, function ($query, $filterYear) {
                $query->whereHas('gaji', function ($query) use ($filterYear) {
                    $query->where('tahun', $filterYear);
                });
            })
            ->paginate(10);

        $opd = Opd::orderBy('nama_satker', 'asc')->get();
        $tahun = Gaji::select('tahun')->groupBy('tahun')->orderBy('tahun', 'desc')->get();

        return view('SPT.index', compact('pegawai', 'search', 'opd', 'tahun'));
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
            $import = new GajiImport($bulan, $tahun);
            Excel::import($import, $request->file('file'));
            $importedCount = $import->getImportedCount();
            session()->flash('success', "Data bulan $request->month berhasil diimpor! Jumlah data yang diimpor: $importedCount");
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }

        return redirect()->back();
    }

    public function export(Request $request)
    {
        $search = $request->input('search');
        $filterYear = $request->input('filterYear');
        $filterOpd = $request->input('filterOpd');

        if ($filterOpd) {
            $opd = Opd::find($filterOpd)->nama_satker;
        }

        $year = $filterYear ?? date('Y');
        $nama_file = $filterOpd != null ? "Laporan Gaji ".$opd." tahun ".$year : "Laporan Gaji ".$year;

        $pegawai = Pegawai::query()
            ->when($search, function ($query, $search) {
                $query->where('nip', 'like', "%{$search}%")
                    ->orWhere('nama', 'like', "%{$search}%");
            })
            ->when($filterOpd, function ($query, $filterOpd) {
                $query->where('opd_id', $filterOpd);
            })
            ->when($filterYear, function ($query, $filterYear) {
                $query->whereHas('gaji', function ($query) use ($filterYear) {
                    $query->where('tahun', $filterYear);
                });
            })
            ->get();

            return Excel::download(new GajiExport($pegawai), $nama_file.'.xlsx');
            // return view('export_gaji', compact('pegawai'));
    }
}
