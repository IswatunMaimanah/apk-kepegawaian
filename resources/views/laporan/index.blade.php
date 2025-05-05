@extends('layouts.app')

@section('page_title', 'Laporan Kepegawaian')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
    <!-- Card: Laporan Kepegawaian -->
    <div class="bg-white p-6 rounded-2xl shadow-lg">
        <h2 class="text-xl font-semibold mb-2 flex items-center gap-2">
            <i class="fas fa-file-alt text-blue-600"></i> Laporan Kepegawaian
        </h2>
        <ul class="list-disc list-inside text-gray-700 mb-4">
            <li>Generate laporan otomatis untuk data pegawai, rekap kehadiran, slip gaji, dan penilaian kinerja pegawai</li>
            <li>Laporan dapat diunduh dalam format PDF atau Excel</li>
            <li>Statistik kepegawaian dapat dilihat secara real-time</li>
        </ul>
        <div class="flex gap-3">
            <a href="#" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Unduh PDF</a>
            <a href="#" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Unduh Excel</a>
        </div>
    </div>

    <!-- Card: Statistik Kepegawaian -->
    <div class="bg-white p-6 rounded-2xl shadow-lg">
        <h2 class="text-xl font-semibold mb-2 flex items-center gap-2">
            <i class="fas fa-chart-bar text-purple-600"></i> Statistik Kepegawaian
        </h2>
        <p class="text-gray-700">Statistik kepegawaian dapat ditampilkan secara real-time menggunakan grafik interaktif atau tabel data untuk membantu analisis performa pegawai.</p>
    </div>
</div>
@endsection
