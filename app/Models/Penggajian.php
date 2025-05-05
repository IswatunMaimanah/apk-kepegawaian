<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    protected $table = 'penggajian';

    protected $fillable = [
        'id_pegawai',
        'periode',
        'gaji_pokok',
        'tunjangan',
        'potongan',
        'total_gaji',
        'status',
    ];

    public $timestamps = true;

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id');
    }
}
