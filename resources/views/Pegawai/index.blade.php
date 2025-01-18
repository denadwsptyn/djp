@extends('app')
@section('title', 'Pegawai')
@section('pegawai', 'here show')
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
                    <h1 class="text-dark fw-bold my-1 fs-3">Data Pegawai</h1>
                </div>
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Header container-->
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle gs-0 gy-3 my-0 table-hover table-striped">
                    <thead>
                        <tr class="fs-6 fw-bold text-gray-800 border-bottom-0">
                            <th class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">NIP</th>
                            <th class="text-center">Tanggal Lahir</th>
                            <th class="text-center">Jabatan</th>
                            <th class="text-center">Golongan</th>
                            <th class="text-center">Masa Kerja Golongan</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">OPD</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nip }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_lahir)->locale('id')->translatedFormat('l, d F Y') }}</td>
                                <td>{{ $item->nama_jabatan }}</td>
                                <td>{{ $item->golongan }}{{ $item->eselon != 00 ? " / Eselon $item->eselon" : '' }}</td>
                                <td>{{ $item->masa_kerja_golongan }} Tahun</td>
                                <td><blockquote>{{ $item->alamat }}</blockquote></td>
                                <td>{{ $item->opd->nama_satker }}</td>
                                <td>
                                    <a href="{{ route('pegawai.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="ki-outline ki-pencil"></i> Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $pegawai->links() }}
            </div>
        </div>
    </div>
@endsection
