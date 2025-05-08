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
        Schema::create('penggajian', function (Blueprint $table) {
            $table->id('id_penggajian');
            $table->unsignedBigInteger('id_pegawai');
            $table->string('periode');
            $table->integer('gaji_pokok');
            $table->integer('tunjangan');
            $table->integer('potongan');
            $table->integer('total_gaji');
            $table->string('status');
            $table->timestamps();

            // Foreign key mengacu ke tabel pegawai
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggajian');
    }
};
