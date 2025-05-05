<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('penilaian_kerja', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pegawai');
            $table->string('periode');
            $table->integer('nilai_disiplin');
            $table->integer('nilai_produktivitas');
            $table->integer('nilai_kerjasama');
            $table->integer('nilai_total')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();

            // Foreign Key Constraint
            $table->foreign('id_pegawai')
                  ->references('id_pegawai')->on('pegawai')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penilaian_kerja');
    }
};
