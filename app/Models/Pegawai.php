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

    // Relasi ke tabel penggajian
    public function penggajian()
    {
        return $this->hasMany(Penggajian::class, 'pegawai_id', 'id_pegawai');
    }
}
