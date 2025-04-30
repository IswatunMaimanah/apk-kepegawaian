@extends('layouts.app')

@section('page_title', 'Penilaian Kinerja Pegawai')

@section('content')
<div class="container">
    <div class="mb-3">
        <a href="#" class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded">+ Tambah Data</a>
    </div>
    <table class="table-auto w-full border-collapse border border-gray-400">
        <thead class="bg-blue-300">
            <tr>
                <th class="border p-2">ID Penilaian</th>
                <th class="border p-2">ID Pegawai</th>
                <th class="border p-2">Bulan</th>
                <th class="border p-2">Tahun</th>
                <th class="border p-2">Nilai</th>
                <th class="border p-2">Komentar</th>
            </tr>
        </thead>
        <tbody>
            @forelse($penilaiankerja as $p)
                <tr>
                    <td class="border p-2">{{ $p['id_penilaian'] }}</td>
                    <td class="border p-2">{{ $p['id_pegawai'] }}</td>
                    <td class="border p-2">{{ $p['bulan'] }}</td>
                    <td class="border p-2">{{ $p['tahun'] }}</td>
                    <td class="border p-2">{{ $p['nilai'] }}</td>
                    <td class="border p-2">{{ $p['komentar'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="border p-2 text-center text-white">Tidak ada data penilaian kerja pegawai</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
