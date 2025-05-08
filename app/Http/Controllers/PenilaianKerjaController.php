<?php

namespace App\Http\Controllers;

use App\Models\PenilaianKerja;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PenilaianKerjaController extends Controller
{
    public function index()
    {
        $penilaiankerja = PenilaianKerja::with('pegawai')->get();
        $pegawai = Pegawai::all();
        return view('penilaiankerja.index', compact('penilaiankerja', 'pegawai'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pegawai' => 'required|exists:pegawai,id_pegawai',
            'periode' => 'required|string|max:7',
            'nilai_disiplin' => 'required|numeric|min:0|max:100',
            'nilai_produktivitas' => 'required|numeric|min:0|max:100',
            'nilai_kerjasama' => 'required|numeric|min:0|max:100',
            'catatan' => 'nullable|string',
        ]);

        $nilai_total = ($request->nilai_disiplin + $request->nilai_produktivitas + $request->nilai_kerjasama) / 3;

        PenilaianKerja::create([
            'id_pegawai' => $request->id_pegawai,
            'periode' => $request->periode,
            'nilai_disiplin' => $request->nilai_disiplin,
            'nilai_produktivitas' => $request->nilai_produktivitas,
            'nilai_kerjasama' => $request->nilai_kerjasama,
            'nilai_total' => $nilai_total,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('penilaian_kerja.index')->with('success', 'Data penilaian kerja berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $penilaian = PenilaianKerja::findOrFail($id);
        $pegawai = Pegawai::all();
        return view('penilaiankerja.edit', compact('penilaian', 'pegawai'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pegawai' => 'required|exists:pegawai,id_pegawai',
            'periode' => 'required|string|max:7',
            'nilai_disiplin' => 'required|numeric|min:0|max:100',
            'nilai_produktivitas' => 'required|numeric|min:0|max:100',
            'nilai_kerjasama' => 'required|numeric|min:0|max:100',
            'catatan' => 'nullable|string',
        ]);

        $penilaian = PenilaianKerja::findOrFail($id);
        $nilai_total = ($request->nilai_disiplin + $request->nilai_produktivitas + $request->nilai_kerjasama) / 3;

        $penilaian->update([
            'id_pegawai' => $request->id_pegawai,
            'periode' => $request->periode,
            'nilai_disiplin' => $request->nilai_disiplin,
            'nilai_produktivitas' => $request->nilai_produktivitas,
            'nilai_kerjasama' => $request->nilai_kerjasama,
            'nilai_total' => $nilai_total,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('penilaian_kerja.index')->with('success', 'Data penilaian kerja berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $penilaian = PenilaianKerja::findOrFail($id);
        $penilaian->delete();

        return redirect()->route('penilaian_kerja.index')->with('success', 'Data penilaian kerja berhasil dihapus.');
    }
}
