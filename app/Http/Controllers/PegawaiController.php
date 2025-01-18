<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::orderBy('nama', 'ASC')->paginate(10);
        return view('Pegawai.index', compact('pegawai'));
    }

    public function edit(Pegawai $pegawai)
    {
        return view('Pegawai.edit', compact('pegawai'));
    }

    public function Update(Request $request, Pegawai $pegawai)
    {
        $pegawai->update($request->all());

        return redirect()->route('pegawai.edit', $pegawai)->with('success', 'Data pegawai berhasil diperbarui');
    }
}
