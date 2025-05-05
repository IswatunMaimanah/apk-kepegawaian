<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::orderBy('tanggal', 'desc')->get();
        return view('absensi.index', compact('absensi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pegawai'   => 'required|integer',
            'tanggal'      => 'required|date',
            'jam_masuk'    => 'required|date_format:H:i',
            'jam_keluar'   => 'nullable|date_format:H:i',
            'status'       => 'required|string|max:50',
            'keterangan'   => 'nullable|string|max:255',
            'sumber_input' => 'required|in:manual,otomatis',
        ]);

        Absensi::create([
            'id_pegawai'   => $request->id_pegawai,
            'tanggal'      => $request->tanggal,
            'jam_masuk'    => $request->jam_masuk,
            'jam_keluar'   => $request->jam_keluar,
            'status'       => $request->status,
            'keterangan'   => $request->keterangan,
            'sumber_input' => $request->sumber_input,
        ]);

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);
        return response()->json($absensi);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pegawai'   => 'required|integer',
            'tanggal'      => 'required|date',
            'jam_masuk'    => 'required|date_format:H:i',
            'jam_keluar'   => 'nullable|date_format:H:i',
            'status'       => 'required|string|max:50',
            'keterangan'   => 'nullable|string|max:255',
            'sumber_input' => 'required|in:manual,otomatis',
        ]);

        $absensi = Absensi::findOrFail($id);
        $absensi->update([
            'id_pegawai'   => $request->id_pegawai,
            'tanggal'      => $request->tanggal,
            'jam_masuk'    => $request->jam_masuk,
            'jam_keluar'   => $request->jam_keluar,
            'status'       => $request->status,
            'keterangan'   => $request->keterangan,
            'sumber_input' => $request->sumber_input,
        ]);

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Absensi::destroy($id);
        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil dihapus!');
    }
}
