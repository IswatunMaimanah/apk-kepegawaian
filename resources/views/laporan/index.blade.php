@extends('layouts.app')

@section('page_title', 'Laporan Kepegawaian')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
    <div class="bg-white p-6 rounded-2xl shadow-lg">
        <h2 class="text-xl font-semibold mb-2 flex items-center gap-2">
            <i class="fas fa-file-alt text-blue-600"></i> Laporan Kepegawaian
        </h2>
        <ul class="list-disc list-inside text-gray-700 mb-4">
            <li>Generate laporan otomatis untuk data pegawai, rekap kehadiran, slip gaji, dan penilaian kinerja pegawai</li>
            <li>Laporan dapat diunduh dalam format PDF</li>
        </ul>

        <form action="{{ route('laporan.unduh.pdf') }}" method="GET" class="flex items-center gap-3">
            <select name="bulan" required class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih Bulan --</option>
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>

            <input type="number" name="tahun" min="2000" max="2100" value="{{ date('Y') }}" required
                   class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />

            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                Unduh PDF
            </button>
        </form>
    </div>
</div>
@endsection
