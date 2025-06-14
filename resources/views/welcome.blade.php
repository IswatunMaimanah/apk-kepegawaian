@extends('layouts.app')

@section('page_title', 'Dashboard')

@section('content')
<div class="container mx-auto">
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
            <h5 class="text-lg font-semibold">Terlambat</h5>
            <h3 class="text-3xl mt-2 font-bold">{{ $terlambat }}</h3>
        </div>

        <div class="bg-purple-600 text-white p-5 rounded-lg shadow">
            <h5 class="text-lg font-semibold">Izin</h5>
            <h3 class="text-3xl mt-2 font-bold">{{ $izin }}</h3>
        </div>

        <div class="bg-pink-600 text-white p-5 rounded-lg shadow">
            <h5 class="text-lg font-semibold">Sakit</h5>
            <h3 class="text-3xl mt-2 font-bold">{{ $sakit }}</h3>
        </div>

        <div class="bg-red-600 text-white p-5 rounded-lg shadow">
            <h5 class="text-lg font-semibold">Alpha</h5>
            <h3 class="text-3xl mt-2 font-bold">{{ $alpha }}</h3>
        </div>

        <div class="bg-teal-500 text-white p-5 rounded-lg shadow col-span-1 md:col-span-2">
            <h5 class="text-lg font-semibold">Persentase Hadir</h5>
            <h3 class="text-3xl mt-2 font-bold">{{ $persentaseHadir }}%</h3>
        </div>
    </div>
</div>
@endsection
