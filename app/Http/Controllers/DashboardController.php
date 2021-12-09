<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Berita;
use App\Models\Mahasiswa;
use App\Models\Yudisium;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $mahasiswa = Mahasiswa::count();
        $alumni = Alumni::count();
        $yudisium = Yudisium::count();
        $berita = Berita::count();

        return view('pages.dashboard', [
            'mahasiswa' => $mahasiswa, 'alumni' => $alumni, 'yudisium' => $yudisium, 'berita' => $berita
        ]);
    }

    public function berita()
    {
        $items = Berita::all();

        return view('pages.mahasiswa.berita.index', [
            'items' => $items
        ]);
    }
}
