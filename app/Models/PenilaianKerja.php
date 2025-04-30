<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenilaianKerja extends Model
{
    // Jika menggunakan tabel dengan nama selain 'pegawai', bisa ditentukan di sini
    protected $table = 'penilaian_kerja';

    // Tentukan kolom yang boleh diisi (Mass Assignment)
    protected $fillable = [
        'id_penilaian',
        'id_pegawai',
        'bulan',
        'tahun',
        'nilai',
        'komentar',
    ];

    // Tentukan kolom yang harus disembunyikan dari array atau JSON (misalnya password)
    protected $hidden = [
        'password',
    ];

    // Jika ada kolom waktu yang otomatis diset oleh Laravel (created_at, updated_at), 
    // kamu bisa menonaktifkannya jika tidak menggunakannya
    public $timestamps = true;

    // Tambahan validasi atau hubungan antar model bisa ditambahkan di sini
}
