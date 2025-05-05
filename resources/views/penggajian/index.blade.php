@extends('layouts.app')

@section('page_title', 'Informasi Penggajian')

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

    {{-- Modal --}}
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50">
        <div class="bg-white p-6 rounded shadow-md w-1/2">
            <h2 class="text-xl font-bold mb-4">Tambah Data Penggajian</h2>
            <form method="POST" action="{{ route('penggajian.store') }}">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label>Nama Pegawai:</label>
                        <select name="id_pegawai" class="w-full border p-2 rounded" required>
                            <option value="">-- Pilih Pegawai --</option>
                            @foreach($pegawai as $peg)
                                <option value="{{ $peg->id }}">{{ $peg->nama_pegawai }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>Periode (YYYY-MM):</label>
                        <input type="month" name="periode" class="w-full border p-2 rounded" required>
                    </div>
                    <div>
                        <label>Gaji Pokok:</label>
                        <input type="text" id="gaji_pokok" name="gaji_pokok" class="w-full border p-2 rounded uang" required>
                    </div>
                    <div>
                        <label>Tunjangan:</label>
                        <input type="text" id="tunjangan" name="tunjangan" class="w-full border p-2 rounded uang" required>
                    </div>
                    <div>
                        <label>Potongan:</label>
                        <input type="text" id="potongan" name="potongan" class="w-full border p-2 rounded uang" required>
                    </div>
                    <div>
                        <label>Total Gaji:</label>
                        <input type="text" id="total_gaji_display" class="w-full border p-2 rounded bg-gray-100" readonly>
                        <input type="hidden" name="total_gaji" id="total_gaji">
                    </div>
                    <div>
                        <label>Status:</label>
                        <select name="status" class="w-full border p-2 rounded" required>
                            <option value="sudah">Sudah</option>
                            <option value="belum">Belum</option>
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

    {{-- Tabel --}}
    <table class="table-auto w-full border-collapse border border-gray-400 mt-4">
        <thead class="bg-blue-300">
            <tr>
                <th class="border p-2">ID</th>
                <th class="border p-2">Nama Pegawai</th>
                <th class="border p-2">Periode</th>
                <th class="border p-2">Gaji Pokok</th>
                <th class="border p-2">Tunjangan</th>
                <th class="border p-2">Potongan</th>
                <th class="border p-2">Total Gaji</th>
                <th class="border p-2">Status</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($penggajian as $p)
                <tr>
                    <td class="border p-2">{{ $p->id }}</td>
                    <td class="border p-2">{{ $p->pegawai->nama_pegawai ?? 'Tidak Diketahui' }}</td>
                    <td class="border p-2">{{ $p->periode }}</td>
                    <td class="border p-2">Rp {{ number_format($p->gaji_pokok, 0, ',', '.') }}</td>
                    <td class="border p-2">Rp {{ number_format($p->tunjangan, 0, ',', '.') }}</td>
                    <td class="border p-2">Rp {{ number_format($p->potongan, 0, ',', '.') }}</td>
                    <td class="border p-2 font-bold">Rp {{ number_format($p->total_gaji, 0, ',', '.') }}</td>
                    <td class="border p-2">{{ ucfirst($p->status) }}</td>
                    <td class="border p-2">
                        <form action="{{ route('penggajian.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="border p-2 text-center text-gray-600">Tidak ada data penggajian</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    function toggleModal() {
        document.getElementById('modal').classList.toggle('hidden');
    }

    function unformatCurrency(str) {
        return parseInt(str.replace(/[^0-9]/g, '')) || 0;
    }

    function formatCurrency(num) {
        return 'Rp ' + num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function hitungTotal() {
        let pokok = unformatCurrency(document.getElementById('gaji_pokok').value);
        let tunjangan = unformatCurrency(document.getElementById('tunjangan').value);
        let potongan = unformatCurrency(document.getElementById('potongan').value);
        let total = pokok + tunjangan - potongan;

        document.getElementById('total_gaji').value = total;
        document.getElementById('total_gaji_display').value = formatCurrency(total);
    }

    document.querySelectorAll('.uang').forEach(input => {
        input.addEventListener('input', function () {
            let value = unformatCurrency(this.value);
            this.value = formatCurrency(value);
            hitungTotal();
        });
    });
</script>
@endsection
