@extends('layouts.app')

@section('page_title', 'Data Pegawai')

@section('content')

<div class="container">

{{-- Alert Sukses --}}
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

    <form method="GET" action="{{ route('pegawai.index') }}" class="flex flex-wrap gap-2 items-center mt-3">
        {{-- Input pencarian nama --}}
        <input type="text" name="search" placeholder="Cari nama pegawai..." value="{{ request('search') }}"
            class="border p-2 rounded w-48">

        {{-- Filter Jenis Kelamin --}}
        <select name="jk" class="border p-2 rounded w-40">
            <option value="">Semua Gender</option>
            <option value="Laki-laki" {{ request('jk') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ request('jk') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>

        {{-- Filter Jabatan --}}
        <select name="jabatan" class="border p-2 rounded w-48">
            <option value="">Semua Jabatan</option>
            @foreach($list_jabatan as $jabatan)
                <option value="{{ $jabatan }}" {{ request('jabatan') == $jabatan ? 'selected' : '' }}>
                    {{ $jabatan }}
                </option>
            @endforeach
        </select>

        {{-- Tombol Cari --}}
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Cari</button>

        {{-- Tombol Reset --}}
        @if(request()->hasAny(['search', 'jk', 'jabatan']))
            <a href="{{ route('pegawai.index') }}" class="text-red-600 hover:underline ml-2">Reset</a>
        @endif
    </form>
</div>

{{-- Modal --}}
<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 {{ $errors->any() ? '' : 'hidden' }}">
    <div class="bg-white p-6 rounded shadow-md w-1/2">
        <h2 class="text-xl font-bold mb-4" id="modal-title">Tambah Data Pegawai</h2>

        {{-- VALIDASI ERROR --}}
        @if ($errors->any())
            <div class="bg-red-200 text-red-800 p-2 mb-3 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="form-modal" method="POST" action="{{ route('pegawai.store') }}">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label>Nama:</label>
                    <input type="text" name="nama_pegawai" id="nama_pegawai" class="w-full border p-2 rounded" value="{{ old('nama_pegawai') }}" required>
                </div>
                <div>
                    <label>Jenis Kelamin:</label>
                    <select name="jk" id="jk" class="w-full border p-2 rounded" required>
                        <option value="Laki-laki" {{ old('jk') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jk') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div>
                    <label>Tanggal Lahir:</label>
                    <input type="date" name="ttl" id="ttl" class="w-full border p-2 rounded" value="{{ old('ttl') }}" required>
                </div>
                <div>
                    <label>No HP:</label>
                    <input type="text" name="no_hp" id="no_hp" class="w-full border p-2 rounded" value="{{ old('no_hp') }}" required
                           pattern="^(\+62|08)[0-9]{9,13}$"
                           maxlength="15"
                           placeholder="+628xxxxxxxxx atau 08xxxxxxxxx">
                </div>
                <div>
                    <label>Email:</label>
                    <input type="email" name="email" id="email" class="w-full border p-2 rounded" value="{{ old('email') }}" required>
                </div>
                <div>
                    <label>Jabatan:</label>
                    <input type="text" name="jabatan" id="jabatan" class="w-full border p-2 rounded" value="{{ old('jabatan') }}" required>
                </div>
            </div>
            <div class="mt-4 flex justify-end gap-2">
                <button type="button" onclick="toggleModal()" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded" id="submit-button">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- Tabel Data --}}
<table class="table-auto w-full border-collapse border border-gray-400 mt-4">
    <thead class="bg-blue-300">
        <tr>
            <th class="border p-2">ID Pegawai</th>
            <th class="border p-2">Nama Pegawai</th>
            <th class="border p-2">Jenis Kelamin</th>
            <th class="border p-2">Tanggal Lahir</th>
            <th class="border p-2">No HP</th>
            <th class="border p-2">Email</th>
            <th class="border p-2">Jabatan</th>
            <th class="border p-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pegawai as $p)
            <tr>
                <td class="border p-2">{{ $p->id_pegawai }}</td>
                <td class="border p-2">{{ $p->nama_pegawai }}</td>
                <td class="border p-2">{{ $p->jk }}</td>
                <td class="border p-2">{{ $p->ttl }}</td>
                <td class="border p-2">{{ $p->no_hp }}</td>
                <td class="border p-2">{{ $p->email }}</td>
                <td class="border p-2">{{ $p->jabatan }}</td>
                <td class="border p-2 text-center">
                    <a href="#" onclick="editPegawai({{ $p->id_pegawai }})" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">Edit</a>
                    <form action="{{ route('pegawai.destroy', $p->id_pegawai) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="border p-2 text-center text-white">Tidak ada data pegawai</td>
            </tr>
        @endforelse
    </tbody>
</table>

</div>

<script>
    function toggleModal() {
        document.getElementById('modal').classList.toggle('hidden');
    }

    function editPegawai(id) {
        fetch(`/pegawai/${id}/edit`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('modal-title').textContent = "Edit Data Pegawai";
                document.getElementById('nama_pegawai').value = data.nama_pegawai;
                document.getElementById('jk').value = data.jk;
                document.getElementById('ttl').value = data.ttl;
                document.getElementById('no_hp').value = data.no_hp;
                document.getElementById('email').value = data.email;
                document.getElementById('jabatan').value = data.jabatan;

                const form = document.getElementById('form-modal');
                form.action = `/pegawai/${id}`;

                const methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'PUT';
                form.appendChild(methodField);

                toggleModal();
            })
            .catch(error => console.error('Error:', error));
    }
</script>

@endsection
