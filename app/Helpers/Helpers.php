<?php

namespace App\Helpers;

class Helpers
{
    public static function hitung_gaji($gaji)
    {
        $total_gaji = $gaji->sum('gaji_pokok');
        return $total_gaji;
    }

    public static function hitung_tunjangan_suami_istri($gaji)
    {
        $total_tunjangan_suami_istri = $gaji->sum('perhitungan_suami_istri');
        return $total_tunjangan_suami_istri;
    }

    public static function hitung_tunjangan_anak($gaji)
    {
        $total_tunjangan_anak = $gaji->sum('perhitungan_anak');
        return $total_tunjangan_anak;
    }

    public static function hitung_tunjangan_keluarga($gaji)
    {
        $total_tunjangan_keluarga = $gaji->sum('tunjangan_keluarga');
        return $total_tunjangan_keluarga;
    }

    public static function hitung_tunjangan_jabatan($gaji)
    {
        $total_tunjangan_jabatan = $gaji->sum('tunjangan_jabatan');
        return $total_tunjangan_jabatan;
    }

    public static function hitung_tunjangan_fungsional($gaji)
    {
        $total_tunjangan_fungsional = $gaji->sum('tunjangan_fungsional');
        return $total_tunjangan_fungsional;
    }

    public static function hitung_tunjangan_fungsional_umum($gaji)
    {
        $total_tunjangan_fungsional_umum = $gaji->sum('tunjangan_fungsional_umum');
        return $total_tunjangan_fungsional_umum;
    }

    public static function hitung_tunjangan_beras($gaji)
    {
        $total_tunjangan_beras = $gaji->sum('tunjangan_beras');
        return $total_tunjangan_beras;
    }

    public static function hitung_tunjangan_pph($gaji)
    {
        $total_tunjangan_pph = $gaji->sum('tunjangan_pph');
        return $total_tunjangan_pph;
    }

    public static function hitung_pembulatan_gaji($gaji)
    {
        $total_pembulatan_gaji = $gaji->sum('pembulatan_gaji');
        return $total_pembulatan_gaji;
    }

    public static function hitung_iuran_jaminan_kesehatan($gaji)
    {
        $total_iuran_jaminan_kesehatan = $gaji->sum('iuran_jaminan_kesehatan');
        return $total_iuran_jaminan_kesehatan;
    }

    public static function hitung_iuran_jaminan_kecelakaan_kerja($gaji)
    {
        $total_iuran_jaminan_kecelakaan_kerja = $gaji->sum('iuran_jaminan_kecelakaan_kerja');
        return $total_iuran_jaminan_kecelakaan_kerja;
    }

    public static function hitung_iuran_jaminan_kematian($gaji)
    {
        $total_iuran_jaminan_kematian = $gaji->sum('iuran_jaminan_kematian');
        return $total_iuran_jaminan_kematian;
    }

    public static function hitung_iuran_simpanan_tapera($gaji)
    {
        $total_iuran_simpanan_tapera = $gaji->sum('iuran_simpanan_tapera');
        return $total_iuran_simpanan_tapera;
    }

    public static function hitung_iuran_pensiun($gaji)
    {
        $total_iuran_pensiun = $gaji->sum('iuran_pensiun');
        return $total_iuran_pensiun;
    }

    public static function hitung_tunjangan_jht($gaji)
    {
        $total_tunjangan_jht = $gaji->sum('tunjangan_jaminan_hari_tua');
        return $total_tunjangan_jht;
    }

    public static function hitung_potongan_iwp($gaji)
    {
        $total_potongan_iwp = $gaji->sum('potongan_iwp');
        return $total_potongan_iwp;
    }

    public static function hitung_potongan_pph_21($gaji)
    {
        $total_potongan_pph_21 = $gaji->sum('potongan_pph_21');
        return $total_potongan_pph_21;
    }

    public static function hitung_zakat($gaji)
    {
        $total_zakat = $gaji->sum('zakat');
        return $total_zakat;
    }

    public static function hitung_bulog($gaji)
    {
        $total_bulog = $gaji->sum('bulog');
        return $total_bulog;
    }

    public static function gaji_bruto($gaji)
    {
        $gaji_bruto = $gaji->sum('gaji_pokok') + $gaji->sum('tunjangan_keluarga') + $gaji->sum('tunjangan_jabatan') + $gaji->sum('tunjangan_fungsional') + $gaji->sum('tunjangan_fungsional_umum') + $gaji->sum('tunjangan_beras') + $gaji->sum('tunjangan_pph') + $gaji->sum('pembulatan_gaji');
        return $gaji_bruto;
    }

    public static function jumlah_potongan($gaji)
    {
        $jumlah_potongan = $gaji->sum('iuran_jaminan_kesehatan') + $gaji->sum('iuran_jaminan_kecelakaan_kerja') + $gaji->sum('iuran_jaminan_kematian') + $gaji->sum('iuran_simpanan_tapera') + $gaji->sum('iuran_pensiun') + $gaji->sum('tunjangan_jaminan_hari_tua') + $gaji->sum('potongan_iwp') + $gaji->sum('potongan_pph_21') + $gaji->sum('zakat') + $gaji->sum('bulog');
        return $jumlah_potongan;
    }
}
