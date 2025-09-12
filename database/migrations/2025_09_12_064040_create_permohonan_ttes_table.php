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
        Schema::create('permohonan_ttes', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('nik', 16);
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('nomor_telepon');
            $table->string('email');
            $table->string('jabatan');
            $table->string('golongan');
            $table->foreignId('opds_id')->constrained('opds');
            $table->date('tanggal_permohonan');
            $table->string('foto_ktp');
            $table->enum('status_permohonan', ['pending', 'diproses', 'selesai', 'ditolak'])->default('pending');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonan_ttes');
    }
};
