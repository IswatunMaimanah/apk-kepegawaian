@extends('layouts.app')

@section('page_title', 'Rekap Kehadiran')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 mb-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <button onclick="toggleModal()" class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded">
            + Tambah Data
        </button>
    </div>

    {{-- Modal Tambah Data --}}
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50">
        <div class="bg-white p-6 rounded shadow-md w-1/2">
            <h2 class="text-xl font-bold mb-4">Tambah Data Absensi</h2>
            <form method="POST" action="{{ route('absensi.store') }}">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label>Nama Pegawai:</label>
                        <select name="id_pegawai" class="w-full border p-2 rounded" required>
                            <option value="">-- Pilih Pegawai --</option>
                            @foreach($pegawai as $p)
                                <option value="{{ $p->id_pegawai }}">{{ $p->nama_pegawai }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>Tanggal:</label>
                        <input type="date" name="tanggal" class="w-full border p-2 rounded" required>
                    </div>
                    <div>
                        <label>Jam Masuk:</label>
                        <input type="time" name="jam_masuk" class="w-full border p-2 rounded" required>
                    </div>
                    <div>
                        <label>Jam Keluar:</label>
                        <input type="time" name="jam_keluar" class="w-full border p-2 rounded">
                    </div>
                    <div>
                        <label>Status:</label>
                        <select name="status" class="w-full border p-2 rounded" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="Hadir">Hadir</option>
                            <option value="Terlambat">Terlambat</option>
                        </select>
                    </div>
                    <div>
                        <label>Keterangan:</label>
                        <input type="text" name="keterangan" class="w-full border p-2 rounded">
                    </div>
                    <div>
                        <label>Sumber Input:</label>
                        <select name="sumber_input" class="w-full border p-2 rounded">
                            <option value="manual">Manual</option>
                            <option value="otomatis">Otomatis</option>
                        </select>
                    </div>
                </div>
                <div class="mt-4 flex justify-end gap-2">
                    <button type="button" onclick="toggleModal()" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Tabel Rekap --}}
    <table class="table-auto w-full border-collapse border border-gray-400 mt-4">
        <thead class="bg-blue-300">
            <tr>
                <th class="border p-2">ID Absensi</th>
                <th class="border p-2">Nama Pegawai</th>
                <th class="border p-2">Tanggal</th>
                <th class="border p-2">Jam Masuk</th>
                <th class="border p-2">Jam Keluar</th>
                <th class="border p-2">Status</th>
                <th class="border p-2">Keterangan</th>
                <th class="border p-2">Sumber Input</th>
            </tr>
        </thead>
        <tbody>
            @forelse($absensi as $a)
                <tr>
                    <td class="border p-2">{{ $a->id }}</td>
                    <td class="border p-2">{{ $a->pegawai->nama_pegawai ?? 'Tidak ditemukan' }}</td>
                    <td class="border p-2">{{ $a->tanggal }}</td>
                    <td class="border p-2">{{ $a->jam_masuk }}</td>
                    <td class="border p-2">{{ $a->jam_keluar ?? 'Belum Keluar' }}</td>
                    <td class="border p-2">{{ $a->status }}</td>
                    <td class="border p-2">{{ $a->keterangan ?? 'Tidak ada' }}</td>
                    <td class="border p-2">{{ $a->sumber_input }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="border p-2 text-center text-gray-700">Tidak ada data absensi</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    function toggleModal() {
        document.getElementById('modal').classList.toggle('hidden');
    }
</script>
@endsection
