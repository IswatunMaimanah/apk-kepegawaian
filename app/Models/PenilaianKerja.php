<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenilaianKerja extends Model
{
    protected $table = 'penilaian_kerja';

    protected $fillable = [
        'id_pegawai',
        'periode',
        'nilai_disiplin',
        'nilai_produktivitas',
        'nilai_kerjasama',
        'nilai_total',
        'catatan',
    ];

    public $timestamps = true;

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }
}
