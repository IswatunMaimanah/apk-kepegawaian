@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Dashboard</h2>
    <div class="row mt-4">

        {{-- Card Statistik --}}
        <div class="col-md-3">
            <div class="card bg-primary text-white mb-3">
                <div class="card-body">
                    <h5>Total Pegawai</h5>
                    <h3>{{ $totalPegawai }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-success text-white mb-3">
                <div class="card-body">
                    <h5>Hadir Hari Ini</h5>
                    <h3>{{ $hadir }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-warning text-dark mb-3">
                <div class="card-body">
                    <h5>Izin</h5>
                    <h3>{{ $izin }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-danger text-white mb-3">
                <div class="card-body">
                    <h5>Alpha</h5>
                    <h3>{{ $alpha }}</h3>
                </div>
            </div>
        </div>

        {{-- Gaji --}}
        <div class="col-md-6">
            <div class="card bg-secondary text-white mb-3">
                <div class="card-body">
                    <h5>Gaji Bulan Ini - Belum Dibayar</h5>
                    <h3>{{ $gajiBelum }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card bg-info text-white mb-3">
                <div class="card-body">
                    <h5>Gaji Bulan Ini - Sudah Dibayar</h5>
                    <h3>{{ $gajiSudah }}</h3>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
