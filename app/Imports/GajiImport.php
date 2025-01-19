<?php

namespace App\Imports;

use App\Models\Gaji;
use App\Models\Opd;
use App\Models\Pegawai;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Webpatser\Uuid\Uuid;

class GajiImport implements ToCollection
{
    protected $bulan;
    protected $tahun;
    protected $importedCount = 0;

    public function __construct($bulan, $tahun)
    {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }

    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        // Iterasi data untuk disimpan ke database
        foreach ($rows as $index => $row) {
            // Lewati baris pertama (header)
            if ($index === 0) {
                continue;
            }

            // Konversi baris ke array
            $rowArray = $row->toArray();

            // Bersihkan spasi yang tidak perlu pada setiap nilai
            $rowArray = array_map('trim', $rowArray);

            // Pastikan setiap nilai yang diperlukan tidak kosong, jika kosong, beri nilai default
            $nip = $rowArray[0] ?? null; // Default null jika tidak ada
            $nama = $rowArray[1] ?? 'Unknown'; // Default 'Unknown' jika nama kosong
            $npwp = preg_replace('/\D/', '', $rowArray[3] ?? null); // Hapus karakter selain angka
            $pegawai_id = Uuid::generate(4); // Generate UUID v4
            $pegawai = Pegawai::where('nip', $nip)->first();

            $opd_id = Uuid::generate(4); // Generate UUID v4
            $opd = Opd::where('nama_satker', $rowArray[45])->first();

            // Simpan ke database
            // jika nip tidak kosong
            if ($nip != null) {

                if (!$opd) {
                    Opd::create([
                        'id' => $opd_id,
                        'nama_satker' => $rowArray[45],
                    ]);
                } else {
                    $opd_id = $opd->id;
                }

                // cek jika pegawai belum ada
                if (!$pegawai) {
                    Pegawai::create([
                        'id' => $pegawai_id,
                        'nip' => $nip,
                        'nama' => $nama,
                        'nik' => $rowArray[2] ?? null,
                        'npwp' => $npwp,
                        'tanggal_lahir' => $rowArray[4] ?? null,
                        'tipe_jabatan' => empty($rowArray[5]) ? 0 : (int)$rowArray[5],
                        'nama_jabatan' => $rowArray[6] ?? null,
                        'eselon' => $rowArray[7] ?? null,
                        'status_asn' => empty($rowArray[8]) ? 1 : (int)$rowArray[8],
                        'golongan' => $rowArray[9] ?? null,
                        'masa_kerja_golongan' => $rowArray[10] ?? null,
                        'alamat' => $rowArray[11] ?? null,
                        'status_pernikahan' => $rowArray[12] ?? null,
                        'jumlah_istri_suami' => empty($rowArray[13]) ? 0 : (int)$rowArray[13],
                        'jumlah_anak' => empty($rowArray[14]) ? 0 : (int)$rowArray[14],
                        'jumlah_tanggungan' => empty($rowArray[15]) ? 0 : (int)$rowArray[15],
                        'pasangan_pns' => $rowArray[16] ?? 'Tidak',
                        'nip_pasangan' => empty($rowArray[17]) ? null : $rowArray[17],
                        'opd_id' => $opd_id,
                    ]);
                } else {
                    $pegawai_id = $pegawai->id;
                }

                Gaji::create([
                    'pegawai_id' => $pegawai_id,
                    'kode_bank' => empty($rowArray[18]) ? null : $rowArray[18],
                    'nama_bank' => empty($rowArray[19]) ? null : $rowArray[19],
                    'nomor_rekening_bank' => empty($rowArray[20]) ? null : $rowArray[20],
                    'gaji_pokok' => empty($rowArray[21]) ? 0 : (int)$rowArray[21],
                    'perhitungan_suami_istri' => empty($rowArray[22]) ? 0 : (int)$rowArray[22],
                    'perhitungan_anak' => empty($rowArray[23]) ? 0 : (int)$rowArray[23],
                    'tunjangan_keluarga' => empty($rowArray[24]) ? 0 : (int)$rowArray[24],
                    'tunjangan_jabatan' => empty($rowArray[25]) ? 0 : (int)$rowArray[25],
                    'tunjangan_fungsional' => empty($rowArray[26]) ? 0 : (int)$rowArray[26],
                    'tunjangan_fungsional_umum' => empty($rowArray[27]) ? 0 : (int)$rowArray[27],
                    'tunjangan_beras' => empty($rowArray[28]) ? 0 : (int)$rowArray[28],
                    'tunjangan_pph' => empty($rowArray[29]) ? 0 : (int)$rowArray[29],
                    'pembulatan_gaji' => empty($rowArray[30]) ? 0 : (int)$rowArray[30],
                    'iuran_jaminan_kesehatan' => empty($rowArray[31]) ? 0 : (int)$rowArray[31],
                    'iuran_jaminan_kecelakaan_kerja' => empty($rowArray[32]) ? 0 : (int)$rowArray[32],
                    'iuran_jaminan_kematian' => empty($rowArray[33]) ? 0 : (int)$rowArray[33],
                    'iuran_simpanan_tapera' => empty($rowArray[34]) ? 0 : (int)$rowArray[34],
                    'iuran_pensiun' => empty($rowArray[35]) ? 0 : (int)$rowArray[35],
                    'tunjangan_khusus_papua' => empty($rowArray[36]) ? 0 : (int)$rowArray[36],
                    'tunjangan_jaminan_hari_tua' => empty($rowArray[37]) ? 0 : (int)$rowArray[37],
                    'potongan_iwp' => empty($rowArray[38]) ? 0 : (int)$rowArray[38],
                    'potongan_pph21' => empty($rowArray[39]) ? 0 : (int)$rowArray[39],
                    'zakat' => empty($rowArray[40]) ? 0 : (int)$rowArray[40],
                    'bulog' => empty($rowArray[41]) ? 0 : (int)$rowArray[41],
                    'jumlah_gaji_dan_tunjangan' => empty($rowArray[42]) ? 0 : (int)$rowArray[42],
                    'jumlah_potongan' => empty($rowArray[43]) ? 0 : (int)$rowArray[43],
                    'jumlah_ditransfer' => empty($rowArray[44]) ? 0 : (int)$rowArray[44],
                    'bulan' => $this->bulan,
                    'tahun' => $this->tahun,
                ]);
            }
            $this->importedCount++;
        }
    }

    public function getImportedCount()
    {
        return $this->importedCount;
    }
}
