@extends('layouts.app')

@section('page_title', 'Data Pegawai')

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
        <h2 class="text-xl font-bold mb-4" id="modal-title">Tambah Data Pegawai</h2>
        <form id="form-modal" method="POST" action="{{ route('pegawai.store') }}">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label>Nama:</label>
                    <input type="text" name="nama_pegawai" id="nama_pegawai" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label>Jenis Kelamin:</label>
                    <select name="jk" id="jk" class="w-full border p-2 rounded" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div>
                    <label>Tempat & Tanggal Lahir:</label>
                    <input type="text" name="ttl" id="ttl" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label>No HP:</label>
                    <input type="text" name="no_hp" id="no_hp" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label>Email:</label>
                    <input type="email" name="email" id="email" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label>Jabatan:</label>
                    <input type="text" name="jabatan" id="jabatan" class="w-full border p-2 rounded" required>
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
            <th class="border p-2">Tempat dan Tanggal Lahir</th>
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
                    <!-- Edit -->
                    <a href="#" onclick="editPegawai({{ $p->id_pegawai }})" class="bg-yellow-400 p-2 rounded text-white">✏️</a>

                    <!-- Delete -->
                    <form action="{{ route('pegawai.destroy', $p->id_pegawai) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 p-2 rounded text-white">🗑</button>
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
        // Ambil data pegawai berdasarkan ID menggunakan AJAX
        fetch(`/pegawai/${id}/edit`)
            .then(response => response.json())
            .then(data => {
                // Set judul modal menjadi "Edit Data Pegawai"
                document.getElementById('modal-title').textContent = "Edit Data Pegawai";

                // Set nilai-nilai input form
                document.getElementById('nama_pegawai').value = data.nama_pegawai;
                document.getElementById('jk').value = data.jk;
                document.getElementById('ttl').value = data.ttl;
                document.getElementById('no_hp').value = data.no_hp;
                document.getElementById('email').value = data.email;
                document.getElementById('jabatan').value = data.jabatan;

                // Ubah form action ke update
                const form = document.getElementById('form-modal');
                form.action = `/pegawai/${id}`;

                // Ubah method form menjadi PUT
                const methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'PUT';
                form.appendChild(methodField);

                // Tampilkan modal
                toggleModal();
            })
            .catch(error => console.error('Error:', error));
    }
</script>

@endsection
