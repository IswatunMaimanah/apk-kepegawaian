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

        // Kehadiran hari ini
        $tanggalHariIni = Carbon::today()->toDateString();
        $hadir = Absensi::where('tanggal', $tanggalHariIni)->where('status', 'hadir')->count();
        $izin = Absensi::where('tanggal', $tanggalHariIni)->where('status', 'izin')->count();
        $sakit = Absensi::where('tanggal', $tanggalHariIni)->where('status', 'sakit')->count();
        $alpha = Absensi::where('tanggal', $tanggalHariIni)->where('status', 'alpha')->count();

        // Gaji bulan ini
        $bulan = Carbon::now()->format('m');
        $tahun = Carbon::now()->format('Y');
        $gajiBelum = Penggajian::where('bulan', $bulan)->where('tahun', $tahun)->where('status', 'belum')->count();
        $gajiSudah = Penggajian::where('bulan', $bulan)->where('tahun', $tahun)->where('status', 'sudah')->count();

        return view('dashboard', compact(
            'totalPegawai',
            'hadir', 'izin', 'sakit', 'alpha',
            'gajiBelum', 'gajiSudah'
        ));
    }
}
