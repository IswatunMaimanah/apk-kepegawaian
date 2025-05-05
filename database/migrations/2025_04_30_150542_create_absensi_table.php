<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id(); // Primary key: id, auto-increment
            $table->string('id_pegawai');
            $table->date('tanggal');
            $table->time('jam_masuk');
            $table->time('jam_keluar')->nullable(); // Bisa null jika belum keluar
            $table->text('status');
            $table->text('keterangan')->nullable(); // Tambahan: bisa kosong
            $table->enum('sumber_input', ['manual', 'otomatis'])->default('manual'); // Tambahan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
