@extends('app')
@section('title', 'SPT TAHUNAN')
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
            <!--begin::Navbar wrapper-->
            <div class="d-flex flex-lg-grow-1 flex-stack gap-5" id="kt_app_navbar_wrapper">
                <!--begin::Search-->
                <div class="d-flex align-items-center align-items-stretch">
                    <!--begin::Search-->

                    <!--end::Search-->
                </div>
                <!--end::Search-->
                <!--begin::Navbar-->
                <div class="d-flex align-items-center gap-2 gap-lg-4">
                    <button type="button" class="btn btn-flex btn-outline btn-active-primary fs-6 h-40px px-4"
                        data-bs-toggle="modal" data-bs-target="#uploadModal">
                        <i class="ki-outline ki-file-up fs-2 pe-2"></i>Import</button>
                    <a href="{{ route('gaji.export') }}" class="btn btn-flex btn-success fs-6 h-40px px-4">
                        <i class="ki-outline ki-file-down fs-2 pe-2"></i>Export</a>
                </div>
                <!--end::Navbar-->
            </div>
            <!--end::Navbar wrapper-->
        </div>
        <!--end::Header container-->
    </div>
@endsection
@section('content')
    <div class="card card-flush mb-xl-10 mb-5">
        <div class="card-header pt-7">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-gray-800">SPT TAHUNAN</span>
                {{-- <span class="text-gray-500 mt-1 fw-semibold fs-6">Updated 37 minutes ago</span> --}}
            </h3>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <div class="row">
                        <div class="col-lg-4">
                            <div id="kt_header_search" class="header-search d-flex align-items-center"
                                data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter"
                                data-kt-search-layout="menu" data-kt-search-responsive="lg" data-kt-menu-trigger="auto"
                                data-kt-menu-permanent="true" data-kt-menu-placement="bottom-start">
                                <!--begin::Tablet and mobile search toggle-->
                                <div data-kt-search-element="toggle"
                                    class="search-toggle-mobile d-flex d-lg-none align-items-center">
                                    <div class="d-flex">
                                        <i class="ki-outline ki-magnifier fs-1"></i>
                                    </div>
                                </div>
                                <!--end::Tablet and mobile search toggle-->
                                <!--begin::Form(use d-none d-lg-block classes for responsive search)-->
                                <form data-kt-search-element="form" method="post" action="{{ route('/') }}"
                                    class="d-none d-lg-block w-100 position-relative mb-5 mb-lg-0" autocomplete="off">
                                    @csrf
                                    @method('GET')
                                    <i
                                        class="ki-outline ki-magnifier search-icon fs-2 text-gray-500 position-absolute top-50 translate-middle-y ms-5"></i>
                                    <input type="text" class="search-input form-control border bg-gray-100 ps-13" name="search"
                                        value="{{ old('search', $search ?? '') }}" placeholder="Cari NIP atau Nama Pegawai..."
                                        data-kt-search-element="input" />
                                    @if (request('search'))
                                        <a href="{{ route('/') }}" class="btn btn-icon btn-secondary position-absolute top-50 end-0 translate-middle-y me-2" data-bs-tooltip="tooltip"
                                            data-bs-placement="right" title="Reset Search">
                                            <i class="ki-outline ki-arrow-circle-left fs-2"></i>
                                        </a>
                                    @endif
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div id="kt_header_search" class="header-search d-flex align-items-center"
                                data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter"
                                data-kt-search-layout="menu" data-kt-search-responsive="lg" data-kt-menu-trigger="auto"
                                data-kt-menu-permanent="true" data-kt-menu-placement="bottom-start">
                                <form data-kt-search-element="form" method="post" action="{{ route('/') }}"
                                    class="d-none d-lg-block w-100 position-relative mb-5 mb-lg-0" autocomplete="off">
                                    @csrf
                                    @method('GET')
                                    <i class="ki-outline ki-filter-search fs-2 text-gray-500 position-absolute top-50 translate-middle-y ms-5"></i>
                                    <select class="form-select form-select-solid ps-13" id="filterYear" name="filterYear"
                                        onchange="this.form.submit()">
                                        <option value="">Pilih Tahun</option>
                                        @foreach ($tahun as $thn)
                                            <option value="{{ $thn->tahun }}"
                                                {{ request('filterYear') == $thn->tahun ? 'selected' : '' }}>
                                                {{ $thn->tahun }}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div id="kt_header_search" class="header-search d-flex align-items-center"
                                data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter"
                                data-kt-search-layout="menu" data-kt-search-responsive="lg" data-kt-menu-trigger="auto"
                                data-kt-menu-permanent="true" data-kt-menu-placement="bottom-start">
                                    <i class="ki-outline ki-filter-search fs-2 text-gray-500 position-absolute top-50 translate-middle-y ms-5"></i>
                                    <select class="form-select form-select-solid ps-13" id="filterOpd" name="filterOpd"
                                        onchange="this.form.submit()">
                                        <option value="">Pilih OPD</option>
                                        @foreach ($opd as $satker)
                                            <option value="{{ $satker->id }}" {{ request('filterOpd') == $satker->id ? 'selected' : '' }}>
                                                {{ $satker->nama_satker }}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal!</strong> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table class="table align-middle gs-0 gy-3 my-0 table-hover table-striped" id="kt_datatable">
                    <thead>
                        <tr class="fs-6 fw-bold text-gray-800 border-bottom-0">
                            <th class="p-0 pb-3 text-center">#</th>
                            <th class="p-0 pb-3 text-center">NIP PEGAWAI</th>
                            <th class="p-0 pb-3 text-center">NAMA PEGAWAI</th>
                            <th class="p-0 pb-3 text-center">NIK PEGAWAI</th>
                            <th class="p-0 pb-3 text-center">NPWP PEGAWAI</th>
                            <th class="p-0 pb-3 text-center">JABATAN</th>
                            <th class="p-0 pb-3 text-center">STATUS ASN</th>
                            <th class="p-0 pb-3 text-center">GOLONGAN</th>
                            <th class="p-0 pb-3 text-center">ESELON</th>
                            <th class="p-0 pb-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pegawai as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-start pe-0">
                                    <span class="text-gray-700 fw-bold fs-6">{{ $item->nip ?? '-' }}</span>
                                </td>
                                <td class="text-start pe-0">
                                    <span class="text-gray-700 fw-bold fs-6">{{ $item->nama ?? '-' }}</span>
                                </td>
                                <td class="pe-0">
                                    <span class="text-gray-700 fw-bold fs-6">{{ $item->nik ?? '-' }}</span>
                                </td>
                                <td class="text-start pe-0">
                                    <span class="text-gray-700 fw-bold fs-6">{{ $item->npwp ?? '-' }}</span>
                                </td>
                                <td class="text-start pe-0">
                                    <span class="text-gray-700 fw-bold fs-6">{{ $item->nama_jabatan ?? '-' }}</span>
                                </td>
                                <td class="text-center pe-0">
                                    <span
                                        class="text-gray-700 fw-bold fs-6">{{ $item->status_asn == 1 ? 'ASN' : 'NON-ASN' }}</span>
                                </td>
                                <td class="text-center pe-0">
                                    <span class="text-gray-700 fw-bold fs-6">{{ $item->golongan ?? '-' }}</span>
                                </td>
                                </td>
                                <td class="text-center pe-0">
                                    <span class="text-gray-700 fw-bold fs-6">{{ $item->eselon ?? '-' }}</span>
                                </td>
                                <td class="text-center pe-0">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('gaji.show', $item->id) }}"
                                            class="btn btn-sm btn-primary me-2">Lihat SPT</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center">Tidak ada data ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $pegawai->appends(['search' => request('search')])->links() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload Data Gaji</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('gaji.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="file" class="form-label">File</label>
                            <input type="file" class="form-control form-control-solid" id="file" name="file"
                                accept=".xlsx, .xls" required>
                        </div>
                        <div class="mb-3">
                            <label for="year" class="form-label">Year</label>
                            <input type="number" class="form-control form-control-solid" id="year" name="year"
                                placeholder="Year" min="1900" max="2100" required>
                        </div>
                        <div class="mb-3">
                            <label for="month" class="form-label">Month</label>
                            <select class="form-select form-select-solid" id="month" name="month" required>
                                <option value="">Pilih Bulan</option>
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Import</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
