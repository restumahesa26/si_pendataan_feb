<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $mahasiswa = Mahasiswa::count();
        $alumni = Alumni::count();

        return view('pages.dashboard', [
            'mahasiswa' => $mahasiswa, 'alumni' => $alumni
        ]);
    }
}
