<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PegawaiController extends Controller
{
    // Menampilkan semua pegawai
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.index', compact('pegawai'));
    }

    // Menyimpan data pegawai baru
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

        $pegawai = Pegawai::create([
            'nama_pegawai'  => $request->nama_pegawai,
            'jk'            => $request->jk,
            'ttl'           => $request->ttl,
            'no_hp'         => $request->no_hp,
            'email'         => $request->email,
            'jabatan'       => $request->jabatan,
        ]);

        Log::info('Data Pegawai Disimpan:', $pegawai->toArray());

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil ditambahkan!');
    }

    // Menampilkan data pegawai untuk diedit
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return response()->json($pegawai); // Mengirimkan data pegawai dalam bentuk JSON
    }

    // Mengupdate data pegawai
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pegawai'  => 'required|string|max:255',
            'jk'            => 'required',
            'ttl'           => 'required',
            'no_hp'         => 'required',
            'email'         => 'required|email',
            'jabatan'       => 'required',
        ]);

        $pegawai = Pegawai::findOrFail($id);

        $pegawai->update([
            'nama_pegawai'  => $request->nama_pegawai,
            'jk'            => $request->jk,
            'ttl'           => $request->ttl,
            'no_hp'         => $request->no_hp,
            'email'         => $request->email,
            'jabatan'       => $request->jabatan,
        ]);

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diperbarui!');
    }

    // Menghapus data pegawai
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil dihapus!');
    }
}
