<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $query = Absensi::query()->with('pegawai');

        if ($request->filled('nama')) {
            $query->whereHas('pegawai', function ($q) use ($request) {
                $q->where('nama_pegawai', 'like', '%' . $request->nama . '%');
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('sumber_input')) {
            $query->where('sumber_input', $request->sumber_input);
        }

        $absensi = $query->orderBy('id', 'asc')->get();
        $pegawai = Pegawai::all();

        return view('absensi.index', compact('absensi', 'pegawai'));
    }

    public function store(Request $request)
    {
        // Potong detik kalau ada
        $request->merge([
            'jam_masuk' => substr($request->jam_masuk, 0, 5),
            'jam_keluar' => $request->jam_keluar ? substr($request->jam_keluar, 0, 5) : null,
        ]);

        $request->validate([
            'id_pegawai'   => 'required|integer',
            'tanggal'      => 'required|date',
            'jam_masuk'    => 'required|date_format:H:i',
            'jam_keluar'   => 'nullable|date_format:H:i',
            'status'       => 'required|string|max:50',
            'keterangan'   => 'nullable|string|max:255',
            'sumber_input' => 'required|in:manual,otomatis',
        ]);

        Absensi::create($request->all());

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);
        $pegawai = Pegawai::orderBy('nama_pegawai')->get();
        return view('absensi.edit', compact('absensi', 'pegawai'));
    }

    public function update(Request $request, $id)
    {
        // Potong detik dari waktu
        $request->merge([
            'jam_masuk' => substr($request->jam_masuk, 0, 5),
            'jam_keluar' => $request->jam_keluar ? substr($request->jam_keluar, 0, 5) : null,
        ]);

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
        $absensi->update($request->all());

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Absensi::destroy($id);
        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil dihapus!');
    }
}
