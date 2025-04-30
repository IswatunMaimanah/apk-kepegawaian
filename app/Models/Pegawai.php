<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';
    public $incrementing = true;
    public $keyType = 'int';

    // Ini tidak wajib, tapi untuk memastikan timestamp berjalan dengan baik
    public $timestamps = true;

    protected $fillable = [
        'nama_pegawai',
        'jk',
        'ttl',
        'no_hp',
        'email',
        'jabatan',
    ];
}



