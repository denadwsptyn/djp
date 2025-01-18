<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gaji', function (Blueprint $table) {
            $table->string('id', 40)->primary();
            $table->string('pegawai_id', 40);
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade');

            $table->string('kode_bank', 10)->nullable();
            $table->string('nama_bank', 50)->nullable();
            $table->string('nomor_rekening_bank', 30)->nullable();

            // Pastikan gaji_pokok dan yang lainnya tidak kosong jika required
            $table->integer('gaji_pokok')->default(0);

            $table->integer('perhitungan_suami_istri')->default(0);
            $table->integer('perhitungan_anak')->default(0);

            $table->integer('tunjangan_keluarga')->default(0);
            $table->integer('tunjangan_jabatan')->default(0);
            $table->integer('tunjangan_fungsional')->default(0);
            $table->integer('tunjangan_fungsional_umum')->default(0);
            $table->integer('tunjangan_beras')->default(0);
            $table->integer('tunjangan_pph')->default(0);
            $table->integer('pembulatan_gaji')->default(0);

            $table->integer('iuran_jaminan_kesehatan')->default(0);
            $table->integer('iuran_jaminan_kecelakaan_kerja')->default(0);
            $table->integer('iuran_jaminan_kematian')->default(0);
            $table->integer('iuran_simpanan_tapera')->default(0);
            $table->integer('iuran_pensiun')->default(0);
            $table->integer('tunjangan_khusus_papua')->default(0);

            $table->integer('tunjangan_jaminan_hari_tua')->default(0);
            $table->integer('potongan_iwp')->default(0);
            $table->integer('potongan_pph21')->default(0);
            $table->integer('zakat')->default(0);
            $table->integer('bulog')->default(0);

            $table->integer('jumlah_gaji_dan_tunjangan')->default(0);
            $table->integer('jumlah_potongan')->default(0);
            $table->integer('jumlah_ditransfer')->default(0);
            
            // Pastikan bulan dan tahun di sini memiliki tipe data yang benar
            $table->string('bulan');
            $table->integer('tahun');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gaji');
    }
};
