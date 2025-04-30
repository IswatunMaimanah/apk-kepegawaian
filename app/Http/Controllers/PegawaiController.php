<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PegawaiController extends Controller
{
    // Menambahkan metode index() untuk menampilkan data pegawai
    public function index()
    {
        // Ambil semua data pegawai dari database
        $pegawai = Pegawai::all();
        
        // Kirim data pegawai ke view
        return view('pegawai.index', compact('pegawai'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pegawai'  => 'required|string|max:255',
            'jk'            => 'required',
            'ttl'           => 'required',
            'no_hp'         => 'required',
            'email'         => 'required|email',
            'jabatan'       => 'required',
        ]);

        // Simpan data ke database
        $pegawai = Pegawai::create([
            'nama_pegawai'  => $request->nama_pegawai,
            'jk'            => $request->jk,
            'ttl'           => $request->ttl,
            'no_hp'         => $request->no_hp,
            'email'         => $request->email,
            'jabatan'       => $request->jabatan,
        ]);

        // Log data pegawai
        Log::info('Data Pegawai Disimpan:', $pegawai->toArray());

        // Redirect setelah menyimpan data
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil ditambahkan!');
    }
}
