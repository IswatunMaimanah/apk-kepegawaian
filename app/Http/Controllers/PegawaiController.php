<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        $query = Pegawai::query();

        // Filter pencarian nama
        if ($request->filled('search')) {
            $query->where('nama_pegawai', 'like', '%' . $request->search . '%');
        }

        // Filter jenis kelamin
        if ($request->filled('jk')) {
            $query->where('jk', $request->jk);
        }

        // Filter jabatan
        if ($request->filled('jabatan')) {
            $query->where('jabatan', $request->jabatan);
        }

        // Ambil data unik untuk dropdown filter jabatan
        $list_jabatan = Pegawai::select('jabatan')->distinct()->pluck('jabatan');

        // Ambil data pegawai
        $pegawai = $query->get();

        return view('pegawai.index', compact('pegawai', 'list_jabatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pegawai' => 'required|string|max:255',
            'jk'           => 'required',
            'ttl'          => 'required|date',
            'no_hp'        => ['required', 'regex:/^(\+62|08)[0-9]{9,13}$/'],
            'email'        => 'required|email',
            'jabatan'      => 'required',
        ], [
            'no_hp.regex' => 'Format No HP harus diawali dengan +62 atau 08 dan terdiri dari 12 hingga 15 digit.',
        ]);

        $pegawai = Pegawai::create($request->only([
            'nama_pegawai', 'jk', 'ttl', 'no_hp', 'email', 'jabatan'
        ]));

        Log::info('Data Pegawai Disimpan:', $pegawai->toArray());

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pegawai = Pegawai::where('id_pegawai', $id)->firstOrFail();
        return response()->json($pegawai);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pegawai' => 'required|string|max:255',
            'jk'           => 'required',
            'ttl'          => 'required|date',
            'no_hp'        => ['required', 'regex:/^(\+62|08)[0-9]{9,13}$/'],
            'email'        => 'required|email',
            'jabatan'      => 'required',
        ], [
            'no_hp.regex' => 'Format No HP harus diawali dengan +62 atau 08 dan terdiri dari 12 hingga 15 digit.',
        ]);

        $pegawai = Pegawai::where('id_pegawai', $id)->firstOrFail();
        $pegawai->update($request->only([
            'nama_pegawai', 'jk', 'ttl', 'no_hp', 'email', 'jabatan'
        ]));

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pegawai = Pegawai::where('id_pegawai', $id)->firstOrFail();
        $pegawai->delete();

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil dihapus!');
    }
}
