<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Absensi;
use App\Models\Penggajian;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Jumlah pegawai
        $totalPegawai = Pegawai::count();

        // Tanggal hari ini
        $tanggalHariIni = Carbon::today()->toDateString();

        // Kehadiran hari ini
        $hadir = Absensi::where('tanggal', $tanggalHariIni)->where('status', 'hadir')->count();
        $terlambat = Absensi::where('tanggal', $tanggalHariIni)->where('status', 'terlambat')->count();
        $izin = Absensi::where('tanggal', $tanggalHariIni)->where('status', 'izin')->count();
        $sakit = Absensi::where('tanggal', $tanggalHariIni)->where('status', 'sakit')->count();
        $alpha = Absensi::where('tanggal', $tanggalHariIni)->where('status', 'alpha')->count();

        // Gaji bulan ini
        $periode = Carbon::now()->format('Y-m');
        $gajiBelum = Penggajian::where('periode', $periode)->where('status', 'belum')->count();
        $gajiSudah = Penggajian::where('periode', $periode)->where('status', 'sudah')->count();

        return view('welcome', compact(
            'totalPegawai',
            'hadir', 'terlambat', 'izin', 'sakit', 'alpha',
            'gajiBelum', 'gajiSudah',
            'periode'
        ));
    }
}
