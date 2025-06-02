@extends('layouts.app')

@section('page_title', 'Edit Absensi')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Data Absensi</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <strong>Oops!</strong> Ada beberapa masalah dengan input Anda:
            <ul class="mt-2 list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('absensi.update', $absensi->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="id_pegawai" class="block font-medium">ID Pegawai</label>
                <select name="id_pegawai" id="id_pegawai" class="w-full border p-2 rounded" required>
                    @foreach($pegawai as $p)
                        <option value="{{ $p->id_pegawai }}" {{ old('id_pegawai', $absensi->id_pegawai) == $p->id_pegawai ? 'selected' : '' }}>
                            {{ $p->nama_pegawai }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="tanggal" class="block font-medium">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="w-full border p-2 rounded" value="{{ old('tanggal', $absensi->tanggal) }}" required>
            </div>

            <div>
                <label for="jam_masuk" class="block font-medium">Jam Masuk</label>
                <input type="time" name="jam_masuk" id="jam_masuk" class="w-full border p-2 rounded" value="{{ old('jam_masuk', $absensi->jam_masuk) }}" required>
            </div>

            <div>
                <label for="jam_keluar" class="block font-medium">Jam Keluar</label>
                <input type="time" name="jam_keluar" id="jam_keluar" class="w-full border p-2 rounded" value="{{ old('jam_keluar', $absensi->jam_keluar) }}">
            </div>

            <div>
                <label for="status" class="block font-medium">Status</label>
                <select name="status" id="status" class="w-full border p-2 rounded" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Hadir" {{ old('status', $absensi->status) == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                    <option value="Terlambat" {{ old('status', $absensi->status) == 'Terlambat' ? 'selected' : '' }}>Terlambat</option>
                </select>
            </div>

            <div>
                <label for="keterangan" class="block font-medium">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" class="w-full border p-2 rounded" value="{{ old('keterangan', $absensi->keterangan) }}">
            </div>

            <div>
                <label for="sumber_input" class="block font-medium">Sumber Input</label>
                <select name="sumber_input" id="sumber_input" class="w-full border p-2 rounded" required>
                    <option value="manual" {{ old('sumber_input', $absensi->sumber_input) == 'manual' ? 'selected' : '' }}>Manual</option>
                    <option value="otomatis" {{ old('sumber_input', $absensi->sumber_input) == 'otomatis' ? 'selected' : '' }}>Otomatis</option>
                </select>
            </div>
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('absensi.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Batal</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Perbarui</button>
        </div>
    </form>
</div>
@endsection
