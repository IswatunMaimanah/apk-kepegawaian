<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPegawai = Pegawai::count();
        $tanggalHariIni = Carbon::today()->toDateString();

        $statusList = ['hadir', 'terlambat', 'izin', 'sakit', 'alpha'];
        $rekap = [];

        foreach ($statusList as $status) {
            $rekap[$status] = Absensi::whereDate('tanggal', $tanggalHariIni)
                                    ->whereRaw('LOWER(status) = ?', [$status])
                                    ->count();
        }

        // Hitung total absensi hari ini
        $totalAbsensi = array_sum($rekap);

        // Hitung persentase hadir jika total pegawai tidak nol
        $persentaseHadir = $totalPegawai > 0 ? round(($rekap['hadir'] / $totalPegawai) * 100, 2) : 0;

        return view('welcome', [
            'totalPegawai' => $totalPegawai,
            'hadir' => $rekap['hadir'],
            'terlambat' => $rekap['terlambat'],
            'izin' => $rekap['izin'],
            'sakit' => $rekap['sakit'],
            'alpha' => $rekap['alpha'],
            'persentaseHadir' => $persentaseHadir
        ]);
    }
}
