<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kejuaraan;
use App\Models\Organisasi;
use App\Models\Pelatihan;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function pelatihan_index()
    {
        $items = Pelatihan::all();

        return view('pages.admin.data-pelatihan.index', [
            'items' => $items
        ]);
    }

    public function kejuaraan_index()
    {
        $items = Kejuaraan::all();

        return view('pages.admin.data-kejuaraan.index', [
            'items' => $items
        ]);
    }

    public function organisasi_index()
    {
        $items = Organisasi::all();

        return view('pages.admin.data-organisasi.index', [
            'items' => $items
        ]);
    }

    public function pelatihan_destroy($id)
    {
        $item = Pelatihan::findOrFail($id);

        $item->delete();

        return redirect()->route('data-pelatihan.index');
    }

    public function kejuaraan_destroy($id)
    {
        $item = Kejuaraan::findOrFail($id);

        $item->delete();

        return redirect()->route('data-kejuaraan.index');
    }

    public function organisasi_destroy($id)
    {
        $item = Organisasi::findOrFail($id);

        $item->delete();

        return redirect()->route('data-organisasi.index');
    }

    public function pelatihan_cetak()
    {
        $items = Pelatihan::all();

        return view('pages.admin.data-pelatihan.pdf', [
            'items' => $items
        ]);
    }

    public function kejuaraan_cetak()
    {
        $items = Kejuaraan::all();

        return view('pages.admin.data-kejuaraan.pdf', [
            'items' => $items
        ]);
    }

    public function organisasi_cetak()
    {
        $items = Organisasi::all();

        return view('pages.admin.data-organisasi.pdf', [
            'items' => $items
        ]);
    }
}
