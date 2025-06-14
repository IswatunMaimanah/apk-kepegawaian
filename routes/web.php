<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\PenggajianController;
use App\Http\Controllers\PenilaianKerjaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Route;

// Route untuk halaman dashboard 
Route::get('/welcome', [DashboardController::class, 'index'])->name('welcome.index');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route baru untuk Manajemen Data Pegawai
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
Route::get('/pegawai/{id}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
Route::put('/pegawai/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
Route::delete('/pegawai/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

// Route baru untuk Absensi
Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
Route::post('/absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');
Route::get('/absensi/{id}/edit', [AbsensiController::class, 'edit'])->name('absensi.edit');
Route::put('/absensi/{id}', [AbsensiController::class, 'update'])->name('absensi.update');
Route::delete('/absensi/{id}', [AbsensiController::class, 'destroy'])->name('absensi.destroy');

// Route baru untuk Penggajian  
Route::get('/penggajian', [PenggajianController::class, 'index'])->name('penggajian.index');
Route::post('/penggajian', [PenggajianController::class, 'store'])->name('penggajian.store');
Route::get('/penggajian/{id}/edit', [PenggajianController::class, 'edit'])->name('penggajian.edit');
Route::put('/penggajian/{id}', [PenggajianController::class, 'update'])->name('penggajian.update');
Route::delete('/penggajian/{id}', [PenggajianController::class, 'destroy'])->name('penggajian.destroy');


// Route baru untuk Penilaian Kerja
Route::get('/penilaian_kerja', [PenilaianKerjaController::class, 'index'])->name('penilaian_kerja.index');
Route::post('/penilaian_kerja', [PenilaianKerjaController::class, 'store'])->name('penilaian_kerja.store');
Route::get('/penilaian_kerja/{id}/edit', [PenilaianKerjaController::class, 'edit'])->name('penilaian_kerja.edit');
Route::put('/penilaian_kerja/{id}', [PenilaianKerjaController::class, 'update'])->name('penilaian_kerja.update');
Route::delete('/penilaian_kerja/{id}', [PenilaianKerjaController::class, 'destroy'])->name('penilaian_kerja.destroy');

Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan/unduh', [LaporanController::class, 'unduhPDF'])->name('laporan.unduh.pdf');
