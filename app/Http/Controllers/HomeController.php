<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
use App\Models\Penilaian;
use App\Models\Peserta;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalLomba = Lomba::count();
        $totalPeserta = Peserta::count();
        $totalPenilaian = Penilaian::count();

        $lombaTerbaru = Lomba::orderBy('created_at', 'desc')->take(5)->get();

        $pesertaTerbaru = Peserta::orderBy('created_at', 'desc')->take(5)->get();

        return view('pages.home', compact('totalLomba', 'totalPeserta', 'totalPenilaian', 'lombaTerbaru', 'pesertaTerbaru'));
    }
}
