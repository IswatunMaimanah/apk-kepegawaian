<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('penilaian_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('id_penilaian')->unique();
            $table->string('id_pegawai');
            $table->string('bulan');
            $table->string('tahun');
            $table->text('nilai');
            $table->text('komentar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian_kerja');
    }
};
