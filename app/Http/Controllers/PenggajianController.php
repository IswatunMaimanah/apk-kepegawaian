<?php

namespace App\Http\Controllers;

use App\Models\Penggajian;

class PenggajianController extends Controller
{
    public function index()
    {
        $penggajian = Penggajian::all(); // ambil data dari database
        return view('penggajian.index', compact('penggajian'));
    }
}