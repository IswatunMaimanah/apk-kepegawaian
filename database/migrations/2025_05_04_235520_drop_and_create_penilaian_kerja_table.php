<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Hapus dulu jika ada
        Schema::dropIfExists('penilaian_kerja');

        // Buat ulang dengan kolom yang lengkap
        Schema::create('penilaian_kerja', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_penilaian')->unique();
            $table->unsignedBigInteger('id_pegawai');
            $table->string('periode', 7);
            $table->decimal('nilai_disiplin', 5, 2);
            $table->decimal('nilai_produktivitas', 5, 2);
            $table->decimal('nilai_kerjasama', 5, 2);
            $table->decimal('nilai_total', 5, 2);
            $table->string('catatan')->nullable();
            $table->timestamps();

            $table->foreign('id_pegawai')
                  ->references('id_pegawai')
                  ->on('pegawai')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penilaian_kerja');
    }
};
