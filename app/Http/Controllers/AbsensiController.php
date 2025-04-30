<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::all(); // ambil data dari database
        return view('absensi.index', compact('absensi'));
    }

    // Method untuk menyimpan data absensi
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_pegawai' => 'required|integer',
            'tanggal'    => 'required|date',
            'masuk'      => 'required|date_format:H:i',
            'keluar'     => 'nullable|date_format:H:i',
            'status'     => 'required|string|max:50',
        ]);

        // Simpan data ke dalam tabel absensi
        Absensi::create([
            'id_pegawai' => $request->id_pegawai,
            'tanggal'    => $request->tanggal,
            'masuk'      => $request->masuk,
            'keluar'     => $request->keluar, // bisa null
            'status'     => $request->status,
        ]);

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil ditambahkan!');
    }
}
