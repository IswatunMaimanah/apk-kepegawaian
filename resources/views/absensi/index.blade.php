@extends('layouts.app')

@section('page_title', 'Rekap Kehadiran')

@section('content')
<div class="container">
    {{-- Alert --}} 
    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 mb-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol Modal --}}
    <div class="mb-3">
        <button onclick="toggleModal()" class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded">
            + Tambah Data
        </button>
    </div>

    {{-- Modal --}}
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50">
        <div class="bg-white p-6 rounded shadow-md w-1/2">
            <h2 class="text-xl font-bold mb-4">Tambah Data Absensi</h2>
            <form method="POST" action="{{ route('absensi.store') }}">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label>ID Pegawai:</label>
                        <input type="number" name="id_pegawai" class="w-full border p-2 rounded" required>
                    </div>
                    <div>
                        <label>Tanggal:</label>
                        <input type="date" name="tanggal" class="w-full border p-2 rounded" required>
                    </div>
                    <div>
                        <label>Jam Masuk:</label>
                        <input type="time" name="masuk" class="w-full border p-2 rounded" required>
                    </div>
                    <div>
                        <label>Jam Keluar:</label>
                        <input type="time" name="keluar" class="w-full border p-2 rounded">
                    </div>
                    <div>
                        <label>Status:</label>
                        <input type="text" name="status" class="w-full border p-2 rounded" required>
                    </div>
                </div>
                <div class="mt-4 flex justify-end gap-2">
                    <button type="button" onclick="toggleModal()" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Tabel Absensi --}}
    <table class="table-auto w-full border-collapse border border-gray-400">
        <thead class="bg-blue-300">
            <tr>
                <th class="border p-2">ID Absensi</th>
                <th class="border p-2">ID Pegawai</th>
                <th class="border p-2">Tanggal</th>
                <th class="border p-2">Masuk</th>
                <th class="border p-2">Keluar</th>
                <th class="border p-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($absensi as $a)
                <tr>
                    <td class="border p-2">{{ $a->id }}</td>
                    <td class="border p-2">{{ $a->id_pegawai }}</td>
                    <td class="border p-2">{{ $a->tanggal }}</td>
                    <td class="border p-2">{{ $a->masuk }}</td>
                    <td class="border p-2">{{ $a->keluar ?? 'Belum Keluar' }}</td>
                    <td class="border p-2">{{ $a->status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="border p-2 text-center text-white">Tidak ada data absensi</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    // Fungsi untuk menampilkan/menyembunyikan modal
    function toggleModal() {
        document.getElementById('modal').classList.toggle('hidden');
    }
</script>
@endsection
