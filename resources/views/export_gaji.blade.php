<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export Gaji Tahunan</title>
    @include('partials.css')
</head>

<body>
    <div class="table-responsive">
        <style>
            .table-responsive {
                overflow-x: auto;
            }

            table {
                border-collapse: collapse;
                width: 100%;
            }

            th,
            td {
                white-space: nowrap;
            }

            thead th.sticky-column,
            tbody td.sticky-column {
                position: sticky;
                background-color: #fff;
                z-index: 2;
                border-right: 1px solid #dee2e6;
            }

            /* Kolom NIP */
            thead th.nip-column,
            tbody td.nip-column {
                left: 0;
                z-index: 3;
            }

            /* Kolom Nama */
            thead th.nama-column,
            tbody td.nama-column {
                left: 150px;
                /* Lebar kolom NIP, sesuaikan jika berbeda */
                z-index: 2;
            }
        </style>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th class="sticky-column nip-column">NIP Pegawai</th>
                    <th class="sticky-column nama-column">Nama Pegawai</th>
                    <th>NIK Pegawai</th>
                    <th>NPWP Pegawai</th>
                    <th>Satker</th>
                    <th>Nama Jabatan</th>
                    <th>Eselon</th>
                    <th>Golongan</th>
                    <th>Masa Kerja Golongan</th>
                    <th>Status Pernikahan</th>
                    <th>Jumlah Istri_Suami</th>
                    <th>Jumlah Anak</th>
                    <th>Jumlah Tanggungan</th>
                    <th>Pasangan PNS</th>
                    <th>NIP Pasangan</th>
                    <th>Gaji Pokok</th>
                    <th>Perhitungan Suami/Istri</th>
                    <th>Perhitungan Anak</th>
                    <th>Tunjangan Keluarga</th>
                    <th>Tunjangan Jabatan</th>
                    <th>Tunjangan Fungsional</th>
                    <th>Tunjangan Fungsional Umum</th>
                    <th>Tunjangan Beras</th>
                    <th>Tunjangan PPH</th>
                    <th>Pembulatan Gaji</th>
                    <th style="background-color: #fa9005">Gaji Bruto</th>
                    <th>Iuran Jaminan Kesehatan</th>
                    <th>Iuran Jaminan Kecelakaan Kerja</th>
                    <th>Iuran Jaminan Kematian</th>
                    <th>Iuran Simpanan Tapera</th>
                    <th>Iuran Pensiun</th>
                    <th>Tunjangan Khusus Papua</th>
                    <th>Tunjangan Jaminan Hari Tua</th>
                    <th>Potongan IWP</th>
                    <th>Potongan PPH21</th>
                    <th>Zakat</th>
                    <th>Bulog</th>
                    <th style="background-color: #ff0000">Jumlah Potongan</th>
                    <th style="background-color: #33ff00">Gaji Neto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pegawai as $employee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="sticky-column nip-column">{{ $employee->nip ? "'$employee->nip" : '-' }}</td>
                        <td class="sticky-column nama-column">{{ $employee->nama }}</td>
                        <td>{{ $employee->nik ? "'$employee->nik" : '-' }}</td>
                        <td>{{ $employee->npwp ? "'$employee->npwp" : '-' }}</td>
                        <td>{{ $employee->opd->nama_satker ?? '-' }}</td>
                        <td>{{ $employee->nama_jabatan ?? '-' }}</td>
                        <td class="text-center">{{ $employee->eselon ?? '-' }}</td>
                        <td class="text-center">{{ $employee->golongan ?? '-' }}</td>
                        <td class="text-center">{{ $employee->masa_kerja_golongan ?? '-' }}</td>
                        <td class="text-center">{{ $employee->status_pernikahan ?? '-' }}</td>
                        <td class="text-center">{{ $employee->jumlah_istri_suami ?? '-' }}</td>
                        <td class="text-center">{{ $employee->jumlah_anak ?? '-' }}</td>
                        <td class="text-center">{{ $employee->jumlah_tanggungan ?? '-' }}</td>
                        <td class="text-center">{{ $employee->pasangan_pns ?? '-' }}</td>
                        <td>{{ $employee->nip_pasangan ? "'$employee->nip_pasangan" : '-' }}</td>
                        <td class="text-end">{{ number_format(Helpers::hitung_gaji($employee->gaji)) }}</td>
                        <td class="text-end">{{ number_format(Helpers::hitung_tunjangan_suami_istri($employee->gaji)) }}</td>
                        <td class="text-end">{{ number_format(Helpers::hitung_tunjangan_anak($employee->gaji)) }}</td>
                        <td class="text-end">{{ number_format(Helpers::hitung_tunjangan_keluarga($employee->gaji)) }}</td>
                        <td class="text-end">{{ number_format(Helpers::hitung_tunjangan_jabatan($employee->gaji)) }}</td>
                        <td class="text-end">{{ number_format(Helpers::hitung_tunjangan_fungsional($employee->gaji)) }}</td>
                        <td class="text-end">{{ number_format(Helpers::hitung_tunjangan_fungsional_umum($employee->gaji)) }}</td>
                        <td class="text-end">{{ number_format(Helpers::hitung_tunjangan_beras($employee->gaji)) }}</td>
                        <td class="text-end">{{ number_format(Helpers::hitung_tunjangan_pph($employee->gaji)) }}</td>
                        <td class="text-end">{{ number_format(Helpers::hitung_pembulatan_gaji($employee->gaji)) }}</td>
                        <td class="text-end fw-bold" style="background-color: #fa9005">{{ number_format(Helpers::gaji_bruto($employee->gaji)) }}</td>
                        <td class="text-end">{{ number_format($employee->iuran_jaminan_kesehatan, 0, ',', '.') }}</td>
                        <td class="text-end">{{ number_format($employee->iuran_jaminan_kecelakaan_kerja, 0, ',', '.') }}</td>
                        <td class="text-end">{{ number_format($employee->iuran_jaminan_kematian, 0, ',', '.') }}</td>
                        <td class="text-end">{{ number_format($employee->iuran_simpanan_tapera, 0, ',', '.') }}</td>
                        <td class="text-end">{{ number_format(Helpers::hitung_iuran_pensiun($employee->gaji)) }}</td>
                        <td class="text-end">{{ number_format($employee->tunjangan_khusus_papua, 0, ',', '.') }}</td>
                        <td class="text-end">{{ number_format(Helpers::hitung_tunjangan_jht($employee->gaji)) }}</td>
                        <td class="text-end">{{ number_format(Helpers::hitung_potongan_iwp($employee->gaji)) }}</td>
                        <td class="text-end">{{ number_format(Helpers::hitung_potongan_pph_21($employee->gaji)) }}</td>
                        <td class="text-end">{{ number_format(Helpers::hitung_zakat($employee->gaji)) }}</td>
                        <td class="text-end">{{ number_format(Helpers::hitung_bulog($employee->gaji)) }}</td>
                        <td class="text-end fw-bold" style="background-color: #ff0000">{{ number_format(Helpers::jumlah_potongan($employee->gaji))}}</td>
                        <td class="text-end fw-bold" style="background-color: #33ff00">{{ number_format(Helpers::gaji_bruto($employee->gaji) - Helpers::jumlah_potongan($employee->gaji)) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
