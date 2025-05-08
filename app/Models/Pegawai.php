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
        return $this->hasMany(Penggajian::class, 'id_pegawai', 'id_pegawai');
    }
}
