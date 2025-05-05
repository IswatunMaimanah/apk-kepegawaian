<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penggajian', function (Blueprint $table) {
            // Tambah kolom id_pegawai tepat setelah primary key id_penggajian
            $table->unsignedBigInteger('id_pegawai')->after('id_penggajian');

            // Buat foreign key mengacu ke tabel pegawai(id_pegawai)
            $table->foreign('id_pegawai')
                  ->references('id_pegawai')
                  ->on('pegawai')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('penggajian', function (Blueprint $table) {
            // Drop constraint dan kolom
            $table->dropForeign(['id_pegawai']);
            $table->dropColumn('id_pegawai');
        });
    }
};
