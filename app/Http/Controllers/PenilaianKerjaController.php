<?php

namespace App\Http\Controllers;

use App\Models\PenilaianKerja;

class PenilaianKerjaController extends Controller
{
    public function index()
    {
        $penilaiankerja = penilaiankerja::all(); // ambil data dari database
        return view('penilaiankerja.index', compact('penilaiankerja'));
    }
}
