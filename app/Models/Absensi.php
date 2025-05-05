<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';

    protected $fillable = [
        'id_pegawai',
        'tanggal',
        'jam_masuk',
        'jam_keluar',
        'status',
        'keterangan',
        'sumber_input',
    ];

    public $timestamps = true;

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }
}
