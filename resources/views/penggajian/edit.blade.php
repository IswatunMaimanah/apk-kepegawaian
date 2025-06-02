@extends('layouts.app')

@section('page_title', 'Edit Penggajian')

@section('content')
<div class="container max-w-2xl mx-auto">
    <h2 class="text-xl font-bold mb-4">Edit Data Penggajian</h2>

    <form action="{{ route('penggajian.update', $penggajian->id_penggajian) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="id_pegawai">Nama Pegawai:</label>
            <select name="id_pegawai" id="id_pegawai" class="w-full border p-2 rounded" required>
                @foreach($pegawai as $pgw)
                    <option value="{{ $pgw->id_pegawai }}" {{ $penggajian->id_pegawai == $pgw->id_pegawai ? 'selected' : '' }}>
                        {{ $pgw->nama_pegawai }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="periode">Periode:</label>
            <input type="month" id="periode" name="periode"
                   value="{{ \Carbon\Carbon::parse($penggajian->periode)->format('Y-m') }}"
                   class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="gaji_pokok">Gaji Pokok:</label>
            <input type="text" id="gaji_pokok" name="gaji_pokok"
                   value="Rp {{ number_format($penggajian->gaji_pokok, 0, ',', '.') }}"
                   class="w-full border p-2 rounded uang" required>
        </div>

        <div class="mb-4">
            <label for="tunjangan">Tunjangan:</label>
            <input type="text" id="tunjangan" name="tunjangan"
                   value="Rp {{ number_format($penggajian->tunjangan, 0, ',', '.') }}"
                   class="w-full border p-2 rounded uang" required>
        </div>

        <div class="mb-4">
            <label for="potongan">Potongan:</label>
            <input type="text" id="potongan" name="potongan"
                   value="Rp {{ number_format($penggajian->potongan, 0, ',', '.') }}"
                   class="w-full border p-2 rounded uang" required>
        </div>

        <div class="mb-4">
            <label for="total_gaji_display">Total Gaji:</label>
            <input type="hidden" name="total_gaji" id="total_gaji" value="{{ $penggajian->total_gaji }}">
            <input type="text" id="total_gaji_display"
                   value="Rp {{ number_format($penggajian->total_gaji, 0, ',', '.') }}"
                   class="w-full border p-2 rounded bg-gray-100" readonly>
        </div>

        <div class="mb-4">
            <label for="status">Status:</label>
            <select name="status" id="status" class="w-full border p-2 rounded" required>
                <option value="sudah" {{ $penggajian->status == 'sudah' ? 'selected' : '' }}>Sudah</option>
                <option value="belum" {{ $penggajian->status == 'belum' ? 'selected' : '' }}>Belum</option>
            </select>
        </div>

        <div class="flex justify-end mt-4">
            <a href="{{ route('penggajian.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded mr-2">Batal</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan Perubahan</button>
        </div>
    </form>
</div>

<script>
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

    document.querySelector('form').addEventListener('submit', function () {
        document.querySelectorAll('.uang').forEach(input => {
            input.value = unformatCurrency(input.value);
        });
    });

    window.addEventListener('load', hitungTotal);
</script>
@endsection
