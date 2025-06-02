@extends('layouts.app')

@section('page_title', 'Dashboard')

@section('content')
<div class="container mx-auto">
    {{-- Baris pertama: Statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-blue-600 text-white p-5 rounded-lg shadow">
            <h5 class="text-lg font-semibold">Total Pegawai</h5>
            <h3 class="text-3xl mt-2 font-bold">{{ $totalPegawai }}</h3>
        </div>

        <div class="bg-green-600 text-white p-5 rounded-lg shadow">
            <h5 class="text-lg font-semibold">Hadir Hari Ini</h5>
            <h3 class="text-3xl mt-2 font-bold">{{ $hadir }}</h3>
        </div>

        <div class="bg-yellow-400 text-black p-5 rounded-lg shadow">
            <h5 class="text-lg font-semibold">Terlambat Hari Ini</h5>
            <h3 class="text-3xl mt-2 font-bold">{{ $terlambat }}</h3>
        </div>
    </div>
</div>
@endsection
