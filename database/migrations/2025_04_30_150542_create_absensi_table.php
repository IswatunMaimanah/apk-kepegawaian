<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id(); // Laravel akan otomatis membuat id_absensi sebagai auto-increment primary key
            $table->string('id_pegawai');
            $table->date('tanggal');
            $table->time('masuk');
            $table->time('keluar')->nullable(); // Kolom keluar bisa null
            $table->text('status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};

