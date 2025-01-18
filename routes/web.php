<?php

use App\Http\Controllers\GajiController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GajiController::class, 'index'])->name('/');
Route::group(['prefix' => 'SPT'], function () {
    Route::get('/gaji-tahunan/{pegawai}', [GajiController::class, 'show'])->name('gaji.show');
    Route::post('/import-gaji', [GajiController::class, 'import'])->name('gaji.import');
    Route::get('/export-gaji', [GajiController::class, 'export'])->name('gaji.export');
    Route::get('/{gaji}', [GajiController::class, 'edit'])->name('gaji.edit');
});

Route::group(['prefix' => 'pegawai'], function () {
    Route::get('/', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/{pegawai}', [PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::put('/{pegawai}', [PegawaiController::class, 'update'])->name('pegawai.update');
});
