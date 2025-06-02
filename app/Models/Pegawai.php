<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';
    public $incrementing = true;
    public $keyType = 'int';
    public $timestamps = true;

    protected $fillable = [
        'nama_pegawai',
        'jk',
        'ttl',
        'no_hp',
        'email',
        'jabatan',
    ];

    // ✅ Perbaikan nama foreign key
    public function penggajian()
    {
        return $this->hasMany(\App\Models\Penggajian::class, 'id_pegawai', 'id_pegawai');
    }
    public function penilaianKerja()
    {
        return $this->hasMany(\App\Models\PenilaianKerja::class, 'id_pegawai', 'id_pegawai');
    }
    public function absensi()
    {
        return $this->hasMany(\App\Models\Absensi::class, 'id_pegawai', 'id_pegawai');
    }


}
