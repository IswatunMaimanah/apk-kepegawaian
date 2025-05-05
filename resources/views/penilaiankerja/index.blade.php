@extends('layouts.app')

@section('page_title', 'Penilaian Kinerja Pegawai')

@section('content')
<div class="container">

    @if(session('success'))
        <div class="bg-green-200 text-green-800 px-4 py-2 rounded mb-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <button onclick="openModal()" class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded">+ Tambah Data</button>
    </div>

    <table class="table-auto w-full border-collapse border border-gray-400">
        <thead class="bg-blue-300">
            <tr>
                <th class="border p-2">ID Penilaian</th>
                <th class="border p-2">Nama Pegawai</th>
                <th class="border p-2">Periode</th>
                <th class="border p-2">Disiplin</th>
                <th class="border p-2">Produktivitas</th>
                <th class="border p-2">Kerjasama</th>
                <th class="border p-2">Total</th>
                <th class="border p-2">Catatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($penilaiankerja as $p)
                <tr>
                    <td class="border p-2">{{ $p->id_penilaian }}</td>
                    <td class="border p-2">{{ $p->pegawai->nama_pegawai ?? 'Tidak ditemukan' }}</td>
                    <td class="border p-2">{{ $p->periode }}</td>
                    <td class="border p-2">{{ $p->nilai_disiplin }}</td>
                    <td class="border p-2">{{ $p->nilai_produktivitas }}</td>
                    <td class="border p-2">{{ $p->nilai_kerjasama }}</td>
                    <td class="border p-2">{{ $p->nilai_total }}</td>
                    <td class="border p-2">{{ $p->catatan }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="border p-2 text-center text-white">Tidak ada data penilaian kerja pegawai</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div id="modalForm" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
            <h2 class="text-xl font-bold mb-4">Tambah Penilaian Kinerja Pegawai</h2>

            <form action="{{ route('penilaian_kerja.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block font-semibold">Nama Pegawai</label>
                    <select name="id_pegawai" class="w-full border rounded p-2" required>
                        <option value="">Pilih Pegawai</option>
                        @foreach($pegawai as $p)
                            <option value="{{ $p->id_pegawai }}">{{ $p->nama_pegawai }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block font-semibold">Periode</label>
                    <input type="text" name="periode" class="w-full border rounded p-2" placeholder="Contoh: 2025-01" required>
                </div>

                <div>
                    <label class="block font-semibold">Nilai Disiplin</label>
                    <input type="number" name="nilai_disiplin" class="w-full border rounded p-2" required>
                </div>

                <div>
                    <label class="block font-semibold">Nilai Produktivitas</label>
                    <input type="number" name="nilai_produktivitas" class="w-full border rounded p-2" required>
                </div>

                <div>
                    <label class="block font-semibold">Nilai Kerjasama</label>
                    <input type="number" name="nilai_kerjasama" class="w-full border rounded p-2" required>
                </div>

                <div>
                    <label class="block font-semibold">Catatan</label>
                    <textarea name="catatan" class="w-full border rounded p-2"></textarea>
                </div>

                <div class="flex gap-2 justify-end">
                    <button type="submit" class="bg-green-700 hover:bg-green-800 text-white py-2 px-4 rounded">Simpan</button>
                    <button type="button" onclick="closeModal()" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('modalForm').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modalForm').classList.add('hidden');
    }
</script>
@endsection
