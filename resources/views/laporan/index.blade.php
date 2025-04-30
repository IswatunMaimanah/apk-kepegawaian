@extends('layouts.app')

@section('page_title', 'Laporan Kepegawaian')

@section('content')
<div class="box">
    <h1>Unduh Laporan</h1>
    <ul>
        <li>Generate laporan otomatis untuk data pegawai, rekap kehadiran, slip gaji, dan penilaian kinerja pegawai</li>
        <li>Laporan dapat diunduh dalam format PDF atau Excel</li>
        <li>Statistik kepegawaian dapat dilihat secara real-time</li>
    </ul>
    <a href="#" class="btn btn-primary">Unduh PDF</a>
    <a href="#" class="btn btn-outline-dark">Unduh Excel</a>
</div>
@endsection
