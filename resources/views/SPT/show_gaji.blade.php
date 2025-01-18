@extends('app')
@section('title', 'Gaji Pegawai')
@section('spt', 'here show')
@section('header')
    <div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: true, lg: true}"
        data-kt-sticky-name="app-header-minimize" data-kt-sticky-offset="{default: '200px', lg: '300px'}"
        data-kt-sticky-animation="false">
        <!--begin::Header container-->
        <div class="app-container container-xxl d-flex align-items-stretch flex-stack" id="kt_app_header_container">
            <!--begin::Header mobile-->
            <div class="d-flex align-items-center d-lg-none">
                <!--begin::Sidebar toggle-->
                <button id="kt_app_sidebar_mobile_toggle"
                    class="btn btn-icon btn-color-gray-500 btn-active-color-primary ms-n4 me-1">
                    <i class="ki-outline ki-burger-menu-6 fs-2x"></i>
                </button>
                <!--end::Sidebar toggle-->
                <!--begin::Logo-->
                <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
                    <a href="index.html">
                        <img alt="Logo" src="assets/media/logos/demo-57.png" class="h-30px" />
                    </a>
                </div>
                <!--end::Logo-->
            </div>
            <!--end::Header mobile-->
            <!--begin::Page title-->
            <div class="d-flex flex-lg-grow-1 flex-stack gap-5">
                <!--begin::Title-->
                <div class="d-flex align-items-center align-items-stretch">
                    <h1 class="text-dark fw-bold my-1 fs-3">Gaji Tahunan <u class="me-2 ms-2">{{ $pegawai->nama }}</u> Tahun
                        {{ $pegawai->gaji[0]['tahun'] }}</h1>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-4">
                    <a href="{{ url()->previous() }}" class="btn btn-dark">
                        <i class="ki-outline ki-arrow-left"></i>
                        Kembali
                    </a>
                </div>
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Header container-->
    </div>
@endsection
@section('content')
    <div class="card card-flush mb-xl-10 mb-5">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle gs-0 gy-3 my-0 table-hover table-striped">
                    <thead>
                        <tr class="fs-6 fw-bold text-gray-800 border-bottom-0">
                            <th class="text-center w-5">#</th>
                            <th class="text-start w-10">Bulan</th>
                            <th class="text-center w-10">Gaji Pokok</th>
                            <th class="text-center w-10">Perhitungan Suami/Istri</th>
                            <th class="text-center w-10">Perhitungan Anak</th>
                            <th class="text-center w-10">Tunjangan Keluarga</th>
                            <th class="text-center w-10">Tunjangan Jabatan</th>
                            <th class="text-center w-10">Tunjangan Fungsional</th>
                            <th class="text-center w-10">Tunjangan Fungsional Umum</th>
                            <th class="text-center w-10">Tunjangan Beras</th>
                            <th class="text-center w-10">Tunjangan PPH</th>
                            <th class="text-center w-10">Pembulatan Gaji</th>
                            <th class="text-center w-10">Iuran Jaminan Kesehatan</th>
                            <th class="text-center w-10">Iuran Jaminan Kecelakaan Kerja</th>
                            <th class="text-center w-10">Iuran Jaminan Kematian</th>
                            <th class="text-center w-10">Iuran Simpanan Tapera</th>
                            <th class="text-center w-10">Iuran Pensiun</th>
                            <th class="text-center w-10">Tunjangan Khusus Papua</th>
                            <th class="text-center w-10">Tunjangan Jaminan Hari Tua</th>
                            <th class="text-center w-10">Potongan IWP</th>
                            <th class="text-center w-10">Potongan PPH21</th>
                            <th class="text-center w-10">Zakat</th>
                            <th class="text-center w-10">Bulog</th>
                            <th class="text-center w-15">Jumlah Gaji dan Tunjangan</th>
                            <th class="text-center w-15">Jumlah Potongan</th>
                            <th class="text-center w-15">Jumlah Ditransfer</th>
                            <th class="text-center w-5"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai->gaji as $item)
                            <tr class="fw-semibold text-gray-700 border-bottom-0">
                                <td class="text-center w-25">{{ $loop->iteration }}</td>
                                <td class="text-start w-10">{{ $item->bulan }}</td>
                                <td class="text-center w-15">{{ number_format($item->gaji_pokok, 0, ',', '.') }}</td>
                                <td class="text-center w-15">
                                    {{ number_format($item->perhitungan_suami_istri, 0, ',', '.') }}</td>
                                <td class="text-center w-15">{{ number_format($item->perhitungan_anak, 0, ',', '.') }}</td>
                                <td class="text-center w-15">{{ number_format($item->tunjangan_keluarga, 0, ',', '.') }}
                                </td>
                                <td class="text-center w-15">{{ number_format($item->tunjangan_jabatan, 0, ',', '.') }}</td>
                                <td class="text-center w-15">{{ number_format($item->tunjangan_fungsional, 0, ',', '.') }}
                                </td>
                                <td class="text-center w-15">
                                    {{ number_format($item->tunjangan_fungsional_umum, 0, ',', '.') }}
                                </td>
                                <td class="text-center w-15">{{ number_format($item->tunjangan_beras, 0, ',', '.') }}</td>
                                <td class="text-center w-15">{{ number_format($item->tunjangan_pph, 0, ',', '.') }}</td>
                                <td class="text-center w-15">{{ number_format($item->pembulatan_gaji, 0, ',', '.') }}</td>
                                <td class="text-center w-15">
                                    {{ number_format($item->iuran_jaminan_kesehatan, 0, ',', '.') }}</td>
                                <td class="text-center w-15">
                                    {{ number_format($item->iuran_jaminan_kecelakaan_kerja, 0, ',', '.') }}</td>
                                <td class="text-center w-15">
                                    {{ number_format($item->iuran_jaminan_kematian, 0, ',', '.') }}</td>
                                <td class="text-center w-15">{{ number_format($item->iuran_simpanan_tapera, 0, ',', '.') }}
                                </td>
                                <td class="text-center w-15">{{ number_format($item->iuran_pensiun, 0, ',', '.') }}</td>
                                <td class="text-center w-15">
                                    {{ number_format($item->tunjangan_khusus_papua, 0, ',', '.') }}</td>
                                <td class="text-center w-15">
                                    {{ number_format($item->tunjangan_jaminan_hari_tua, 0, ',', '.') }}
                                </td>
                                <td class="text-center w-15">{{ number_format($item->potongan_iwp, 0, ',', '.') }}</td>
                                <td class="text-center w-15">{{ number_format($item->potongan_pph21, 0, ',', '.') }}</td>
                                <td class="text-center w-15">{{ number_format($item->zakat, 0, ',', '.') }}</td>
                                <td class="text-center w-15">{{ number_format($item->bulog, 0, ',', '.') }}</td>
                                <td class="text-center w-20">
                                    {{ number_format($item->jumlah_gaji_dan_tunjangan, 0, ',', '.') }}
                                </td>
                                <td class="text-center w-20">{{ number_format($item->jumlah_potongan, 0, ',', '.') }}</td>
                                <td class="text-center w-20">{{ number_format($item->jumlah_ditransfer, 0, ',', '.') }}
                                </td>
                                <td>
                                    <a href="{{ route('gaji.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="ki-outline ki-pencil"></i>
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @php
                            $total_gaji_pokok = $pegawai->gaji->sum('gaji_pokok');
                            $total_perhitungan_suami_istri = $pegawai->gaji->sum('perhitungan_suami_istri');
                            $total_perhitungan_anak = $pegawai->gaji->sum('perhitungan_anak');
                            $total_tunjangan_keluarga = $pegawai->gaji->sum('tunjangan_keluarga');
                            $total_tunjangan_jabatan = $pegawai->gaji->sum('tunjangan_jabatan');
                            $total_tunjangan_fungsional = $pegawai->gaji->sum('tunjangan_fungsional');
                            $total_tunjangan_fungsional_umum = $pegawai->gaji->sum('tunjangan_fungsional_umum');
                            $total_tunjangan_beras = $pegawai->gaji->sum('tunjangan_beras');
                            $total_tunjangan_pph = $pegawai->gaji->sum('tunjangan_pph');
                            $total_pembulatan_gaji = $pegawai->gaji->sum('pembulatan_gaji');
                            $total_iuran_jaminan_kesehatan = $pegawai->gaji->sum('iuran_jaminan_kesehatan');
                            $total_iuran_jaminan_kecelakaan_kerja = $pegawai->gaji->sum(
                                'iuran_jaminan_kecelakaan_kerja',
                            );
                            $total_iuran_jaminan_kematian = $pegawai->gaji->sum('iuran_jaminan_kematian');
                            $total_iuran_simpanan_tapera = $pegawai->gaji->sum('iuran_simpanan_tapera');
                            $total_iuran_pensiun = $pegawai->gaji->sum('iuran_pensiun');
                            $total_tunjangan_khusus_papua = $pegawai->gaji->sum('tunjangan_khusus_papua');
                            $total_tunjangan_jaminan_hari_tua = $pegawai->gaji->sum('tunjangan_jaminan_hari_tua');
                            $total_potongan_iwp = $pegawai->gaji->sum('potongan_iwp');
                            $total_potongan_pph21 = $pegawai->gaji->sum('potongan_pph21');
                            $total_zakat = $pegawai->gaji->sum('zakat');
                            $total_bulog = $pegawai->gaji->sum('bulog');
                            $total_jumlah_gaji_dan_tunjangan = $pegawai->gaji->sum('jumlah_gaji_dan_tunjangan');
                            $total_jumlah_potongan = $pegawai->gaji->sum('jumlah_potongan');
                            $total_jumlah_ditransfer = $pegawai->gaji->sum('jumlah_ditransfer');
                        @endphp
                        <tr>
                            <td colspan="27"></td>
                        </tr>
                        <tr class="fw-bold fs-6 text-gray-800 border-top">
                            <td colspan="2" class="text-center">Total</td>
                            <td class="text-center">{{ number_format($total_gaji_pokok, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($total_perhitungan_suami_istri, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($total_perhitungan_anak, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($total_tunjangan_keluarga, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($total_tunjangan_jabatan, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($total_tunjangan_fungsional, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($total_tunjangan_fungsional_umum, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($total_tunjangan_beras, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($total_tunjangan_pph, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($total_pembulatan_gaji, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($total_iuran_jaminan_kesehatan, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($total_iuran_jaminan_kecelakaan_kerja, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($total_iuran_jaminan_kematian, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($total_iuran_simpanan_tapera, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($total_iuran_pensiun, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($total_tunjangan_khusus_papua, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($total_tunjangan_jaminan_hari_tua, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($total_potongan_iwp, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($total_potongan_pph21, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($total_zakat, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($total_bulog, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($total_jumlah_gaji_dan_tunjangan, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($total_jumlah_potongan, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($total_jumlah_ditransfer, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
