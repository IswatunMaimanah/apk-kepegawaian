<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\PenggajianController;
use App\Http\Controllers\PenilaianKerjaController;
use App\Http\Controllers\LaporanController;

// Route untuk halaman dashboard 
Route::get('/welcome', [DashboardController::class, 'index'])->name('welcome.index');

// Route baru untuk Manajemen Data Pegawai
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');

// Route baru untuk Absensi
Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
Route::post('/absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');

// Route baru untuk Penggajian
Route::get('/penggajian', [PenggajianController::class, 'index'])->name('penggajian.index');

// Route baru untuk Penilaian Kerja
Route::get('/penilaian_kerja', [PenilaianKerjaController::class, 'index'])->name('penilaian_kerja.index');

Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
