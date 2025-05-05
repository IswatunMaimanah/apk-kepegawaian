<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('penilaian_kerja', function (Blueprint $table) {
            $table->string('id_penilaian')->unique()->after('id');
        });
    }

    public function down(): void
    {
        Schema::table('penilaian_kerja', function (Blueprint $table) {
            $table->dropColumn('id_penilaian');
        });
    }
};
