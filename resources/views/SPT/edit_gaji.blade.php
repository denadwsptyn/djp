@extends('app')
@section('title', 'Edit Gaji')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Gaji dan Tunjangan</h3>
        </div>
        <div class="card-body">
            <form action="#" method="POST">
                <div class="row">
                    <!-- Bulan -->
                    <div class="col-md-6 mb-4">
                        <label for="bulan" class="form-label">Bulan</label>
                        <select class="form-select" id="bulan" name="bulan">
                            <option value="" selected>Pilih Bulan</option>
                            <option value="Januari" {{ $gaji->bulan == 'Januari' ? 'selected' : '' }}>Januari</option>
                            <option value="Februari" {{ $gaji->bulan == 'Februari' ? 'selected' : '' }}>Februari</option>
                            <option value="Maret" {{ $gaji->bulan == 'Maret' ? 'selected' : '' }}>Maret</option>
                            <option value="April" {{ $gaji->bulan == 'April' ? 'selected' : '' }}>April</option>
                            <option value="Mei" {{ $gaji->bulan == 'Mei' ? 'selected' : '' }}>Mei</option>
                            <option value="Juni" {{ $gaji->bulan == 'Juni' ? 'selected' : '' }}>Juni</option>
                            <option value="Juli" {{ $gaji->bulan == 'Juli' ? 'selected' : '' }}>Juli</option>
                            <option value="Agustus" {{ $gaji->bulan == 'Agustus' ? 'selected' : '' }}>Agustus</option>
                            <option value="September" {{ $gaji->bulan == 'September' ? 'selected' : '' }}>September</option>
                            <option value="Oktober" {{ $gaji->bulan == 'Oktober' ? 'selected' : '' }}>Oktober</option>
                            <option value="November" {{ $gaji->bulan == 'November' ? 'selected' : '' }}>November</option>
                            <option value="Desember" {{ $gaji->bulan == 'Desember' ? 'selected' : '' }}>Desember</option>
                        </select>
                    </div>

                    <!-- Kolom Input -->
                    <div class="col-md-6 mb-4">
                        <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                        <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok"
                            placeholder="Masukkan Gaji Pokok" value="{{ $gaji->gaji_pokok }}">
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="perhitungan_suami_istri" class="form-label">Perhitungan Suami/Istri</label>
                        <input type="number" class="form-control" id="perhitungan_suami_istri"
                            name="perhitungan_suami_istri" placeholder="Masukkan Nilai" value="{{ $gaji->perhitungan_suami_istri }}">
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="perhitungan_anak" class="form-label">Perhitungan Anak</label>
                        <input type="number" class="form-control" id="perhitungan_anak" name="perhitungan_anak"
                            placeholder="Masukkan Nilai" value="{{ $gaji->perhitungan_anak }}">
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="tunjangan_keluarga" class="form-label">Tunjangan Keluarga</label>
                        <input type="number" class="form-control" id="tunjangan_keluarga" name="tunjangan_keluarga"
                            placeholder="Masukkan Nilai" value="{{ $gaji->tunjangan_keluarga }}">
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="tunjangan_jabatan" class="form-label">Tunjangan Jabatan</label>
                        <input type="number" class="form-control" id="tunjangan_jabatan" name="tunjangan_jabatan"
                            placeholder="Masukkan Nilai" value="{{ $gaji->tunjangan_jabatan }}">
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="tunjangan_fungsional" class="form-label">Tunjangan Fungsional</label>
                        <input type="number" class="form-control" id="tunjangan_fungsional" name="tunjangan_fungsional"
                            placeholder="Masukkan Nilai" value="{{ $gaji->tunjangan_fungsional }}">
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="tunjangan_fungsional_umum" class="form-label">Tunjangan Fungsional Umum</label>
                        <input type="number" class="form-control" id="tunjangan_fungsional_umum"
                            name="tunjangan_fungsional_umum" placeholder="Masukkan Nilai" value="{{ $gaji->tunjangan_fungsional_umum }}">
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="tunjangan_beras" class="form-label">Tunjangan Beras</label>
                        <input type="number" class="form-control" id="tunjangan_beras" name="tunjangan_beras"
                            placeholder="Masukkan Nilai" value="{{ $gaji->tunjangan_beras }}">
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="tunjangan_pph" class="form-label">Tunjangan PPH</label>
                        <input type="number" class="form-control" id="tunjangan_pph" name="tunjangan_pph"
                            placeholder="Masukkan Nilai" value="{{ $gaji->tunjangan_pph }}">
                    </div>

                    <!-- Tambahkan lebih banyak kolom sesuai kebutuhan -->

                    <div class="col-md-6 mb-4">
                        <label for="jumlah_gaji_tunjangan" class="form-label">Jumlah Gaji dan Tunjangan</label>
                        <input type="number" class="form-control" id="jumlah_gaji_tunjangan"
                            name="jumlah_gaji_tunjangan" placeholder="Masukkan Total Gaji dan Tunjangan" value="{{ $gaji->jumlah_gaji_tunjangan }}">
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="jumlah_potongan" class="form-label">Jumlah Potongan</label>
                        <input type="number" class="form-control" id="jumlah_potongan" name="jumlah_potongan"
                            placeholder="Masukkan Total Potongan" value="{{ $gaji->jumlah_potongan }}">
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="jumlah_ditransfer" class="form-label">Jumlah Ditransfer</label>
                        <input type="number" class="form-control" id="jumlah_ditransfer" name="jumlah_ditransfer"
                            placeholder="Masukkan Jumlah Ditransfer" value="{{ $gaji->jumlah_ditransfer }}">
                    </div>
                </div>
        </div>
        <div class="card-footer">
            <!-- Submit Button -->
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
            </form>
        </div>
    </div>
@endsection
