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
    Schema::create('pegawai', function (Blueprint $table) {
        $table->id('id_pegawai');
        $table->string('nama_pegawai');
        $table->string('jk');
        $table->string('ttl');
        $table->string('no_hp');
        $table->string('email');
        $table->string('jabatan');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
