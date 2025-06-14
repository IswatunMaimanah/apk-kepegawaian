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

    {{-- FORM FILTER --}}
    <form method="GET" action="{{ route('absensi.index') }}" class="mb-4 flex flex-wrap gap-2 items-end">
        <div>
            <label class="block text-sm">Nama Pegawai</label>
            <input type="text" name="nama" value="{{ request('nama') }}" class="border p-2 rounded w-48">
        </div>
        <div>
            <label class="block text-sm">Status</label>
            <select name="status" class="border p-2 rounded w-40">
                <option value="">-- Semua --</option>
                <option value="hadir" {{ request('status') == 'hadir' ? 'selected' : '' }}>Hadir</option>
                <option value="terlambat" {{ request('status') == 'terlambat' ? 'selected' : '' }}>Terlambat</option>
                <option value="sakit" {{ request('status') == 'sakit' ? 'selected' : '' }}>Sakit</option>
                <option value="izin" {{ request('status') == 'izin' ? 'selected' : '' }}>Izin</option>
                <option value="alpha" {{ request('status') == 'alpha' ? 'selected' : '' }}>Alpha</option>
            </select>
        </div>
        <div>
            <label class="block text-sm">Sumber Input</label>
            <select name="sumber_input" class="border p-2 rounded w-40">
                <option value="">-- Semua --</option>
                <option value="manual" {{ request('sumber_input') == 'manual' ? 'selected' : '' }}>Manual</option>
                <option value="otomatis" {{ request('sumber_input') == 'otomatis' ? 'selected' : '' }}>Otomatis</option>
            </select>
        </div>
        <div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Cari</button>
            <a href="{{ route('absensi.index') }}" class="ml-2 text-sm text-gray-600 underline">Reset</a>
        </div>
    </form>

    {{-- MODAL TAMBAH DATA --}}
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
                            <option value="hadir">Hadir</option>
                            <option value="terlambat">Terlambat</option>
                            <option value="sakit">Sakit</option>
                            <option value="izin">Izin</option>
                            <option value="alpha">Alpha</option>
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

    {{-- TABEL REKAP --}}
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
                <th class="border p-2">Aksi</th>
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
                    <td class="border p-2">{{ ucfirst($a->status) }}</td>
                    <td class="border p-2">{{ $a->keterangan ?? 'Tidak ada' }}</td>
                    <td class="border p-2">{{ $a->sumber_input }}</td>
                    <td class="border p-2">
                        <div class="flex gap-2 justify-center">
                            <a href="{{ route('absensi.edit', $a->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">Edit</a>
                            <form action="{{ route('absensi.destroy', $a->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="border p-2 text-center text-gray-700">Tidak ada data absensi</td>
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
