<?php

namespace App\Http\Controllers;

use App\Models\Penggajian;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PenggajianController extends Controller
{
    public function index()
    {
        $penggajian = Penggajian::with('pegawai')->get();
        $pegawai = Pegawai::all();
        return view('penggajian.index', compact('penggajian', 'pegawai'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pegawai' => 'required|exists:pegawai,id_pegawai', // diperbaiki di sini
            'periode' => 'required|date_format:Y-m',
            'gaji_pokok' => 'required|numeric',
            'tunjangan' => 'required|numeric',
            'potongan' => 'required|numeric',
            'status' => 'required|in:sudah,belum',
        ]);

        $total = $request->gaji_pokok + $request->tunjangan - $request->potongan;

        Penggajian::create([
            'id_pegawai' => $request->id_pegawai,
            'periode' => $request->periode,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan,
            'potongan' => $request->potongan,
            'total_gaji' => $total,
            'status' => $request->status,
        ]);

        return redirect()->route('penggajian.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $penggajian = Penggajian::findOrFail($id);
        $pegawai = Pegawai::all();
        return view('penggajian.edit', compact('penggajian', 'pegawai'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pegawai' => 'required|exists:pegawai,id_pegawai',
            'periode' => 'required|date_format:Y-m',
            'gaji_pokok' => 'required|numeric',
            'tunjangan' => 'required|numeric',
            'potongan' => 'required|numeric',
            'status' => 'required|in:sudah,belum',
        ]);

        $penggajian = Penggajian::findOrFail($id);
        $total = $request->gaji_pokok + $request->tunjangan - $request->potongan;

        $penggajian->update([
            'id_pegawai' => $request->id_pegawai,
            'periode' => $request->periode,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan,
            'potongan' => $request->potongan,
            'total_gaji' => $total,
            'status' => $request->status,
        ]);

        return redirect()->route('penggajian.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $penggajian = Penggajian::findOrFail($id);
        $penggajian->delete();

        return redirect()->route('penggajian.index')->with('success', 'Data berhasil dihapus.');
    }
}
