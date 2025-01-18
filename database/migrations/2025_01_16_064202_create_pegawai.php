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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->string('id', 40)->primary();
            $table->string('nip', 20)->unique();
            $table->string('nama', 100);
            $table->string('nik', 20)->nullable();
            $table->string('npwp', 30)->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->integer('tipe_jabatan')->default(0); // Pastikan tipe ini hanya menyimpan nilai angka
            $table->string('nama_jabatan', 100);
            $table->string('eselon', 5)->nullable();
            $table->integer('status_asn')->default(1);
            $table->string('golongan', 5);
            $table->string('masa_kerja_golongan', 20)->nullable();
            $table->text('alamat')->nullable();
            $table->string('status_pernikahan', 20)->nullable();
            $table->integer('jumlah_istri_suami')->default(0);
            $table->integer('jumlah_anak')->default(0);
            $table->integer('jumlah_tanggungan')->default(0);
            $table->string('pasangan_pns')->nullable();
            $table->string('nip_pasangan', 20)->nullable();
            $table->string('opd_id', 40);
            $table->foreign('opd_id')->references('id')->on('opd')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
