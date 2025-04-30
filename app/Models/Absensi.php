<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    // Tentukan nama tabel yang digunakan
    protected $table = 'absensi';  

    // Tentukan kolom yang boleh diisi (Mass Assignment)
    protected $fillable = [
        'id_pegawai',
        'tanggal',
        'masuk',
        'keluar',
        'status',
    ];

    // Tentukan kolom waktu yang otomatis diset oleh Laravel (created_at, updated_at)
    public $timestamps = true;
}

