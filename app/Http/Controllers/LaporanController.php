<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function unduhPDF(Request $request)
{
    $bulan = $request->input('bulan'); // Contoh '04'
    $tahun = Carbon::now()->year;

    if (!$bulan) {
        $bulan = Carbon::now()->format('m');
    }

    $periode = $tahun . '-' . $bulan; // Format 'YYYY-MM' misal '2025-04'
    $periodeNama = Carbon::createFromFormat('Y-m', $periode)->translatedFormat('F Y');

    $pegawai = Pegawai::with([
        'absensi' => function ($query) use ($periode) {
            $query->where('tanggal', 'like', "$periode%");
        },
        'penggajian' => function ($query) use ($periode) {
            $query->where('periode', $periode);
        },
        'penilaianKerja' => function ($query) use ($periode) {
            $query->where('periode', $periode);
        }
    ])->get();

    $pdf = Pdf::loadView('laporan.template_pdf', [
        'pegawai' => $pegawai,
        'periode' => $periodeNama
    ]);

    return $pdf->download("laporan_pegawai_{$periode}.pdf");
}

}
