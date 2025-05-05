@extends('layouts.app')

@section('page_title', 'Edit Data Penggajian')

@section('content')
<div class="container">
    <h2 class="text-xl font-bold mb-4">Edit Data Penggajian</h2>

    <form method="POST" action="{{ route('penggajian.update', $penggajian->id) }}">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label>Nama Pegawai:</label>
                <select name="id_pegawai" class="w-full border p-2 rounded" required>
                    @foreach($pegawai as $peg)
                        <option value="{{ $peg->id }}" {{ $penggajian->id_pegawai == $peg->id ? 'selected' : '' }}>
                            {{ $peg->nama_pegawai }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Periode (YYYY-MM):</label>
                <input type="month" name="periode" value="{{ $penggajian->periode }}" class="w-full border p-2 rounded" required>
            </div>
            <div>
                <label>Gaji Pokok:</label>
                <input type="text" id="gaji_pokok" name="gaji_pokok" value="Rp {{ number_format($penggajian->gaji_pokok, 0, ',', '.') }}" class="w-full border p-2 rounded uang" required>
            </div>
            <div>
                <label>Tunjangan:</label>
                <input type="text" id="tunjangan" name="tunjangan" value="Rp {{ number_format($penggajian->tunjangan, 0, ',', '.') }}" class="w-full border p-2 rounded uang" required>
            </div>
            <div>
                <label>Potongan:</label>
                <input type="text" id="potongan" name="potongan" value="Rp {{ number_format($penggajian->potongan, 0, ',', '.') }}" class="w-full border p-2 rounded uang" required>
            </div>
            <div>
                <label>Total Gaji:</label>
                <input type="text" id="total_gaji_display" class="w-full border p-2 rounded bg-gray-100" readonly>
                <input type="hidden" name="total_gaji" id="total_gaji">
            </div>
            <div>
                <label>Status:</label>
                <select name="status" class="w-full border p-2 rounded" required>
                    <option value="sudah" {{ $penggajian->status == 'sudah' ? 'selected' : '' }}>Sudah</option>
                    <option value="belum" {{ $penggajian->status == 'belum' ? 'selected' : '' }}>Belum</option>
                </select>
            </div>
        </div>

        <div class="mt-4 flex justify-end gap-2">
            <a href="{{ route('penggajian.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan Perubahan</button>
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

    window.addEventListener('load', hitungTotal);
</script>
@endsection
