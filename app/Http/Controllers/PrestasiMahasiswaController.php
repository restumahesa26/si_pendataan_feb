<?php

namespace App\Http\Controllers;

use App\Models\Kejuaraan;
use App\Models\Organisasi;
use App\Models\Pelatihan;
use App\Models\PrestasiMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PrestasiMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelatihan = Pelatihan::where('user_id', Auth::user()->id)->get();
        $kejuaraan = Kejuaraan::where('user_id', Auth::user()->id)->get();
        $organisasi = Organisasi::where('user_id', Auth::user()->id)->get();

        return view('pages.mahasiswa.prestasi.index', [
            'items' => $pelatihan, 'items2' => $kejuaraan, 'items3' => $organisasi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_prestasi' => 'required|string|max:255',
            'jenis_prestasi' => 'required|string|max:255',
            'tingkat_prestasi' => 'required|string|max:255',
            'tahun' => 'required',
            'file_sertifikat' => 'required|image|mimes:jpeg,png,jpg|max:1024'
        ]);

        $value = $request->file('file_sertifikat');
        $extension = $value->extension();
        $imageNames = uniqid('img_', microtime()) . '.' . $extension;
        Storage::putFileAs('public/assets/file-sertifikat', $value, $imageNames);

        PrestasiMahasiswa::create([
            'user_id' => Auth::user()->id,
            'nama_prestasi' => $request->nama_prestasi,
            'jenis_prestasi' => $request->jenis_prestasi,
            'tingkat_prestasi' => $request->tingkat_prestasi,
            'tahun' => $request->tahun,
            'file_sertifikat' => $imageNames
        ]);

        return redirect()->route('prestasi-mahasiswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrestasiMahasiswa  $prestasiMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(PrestasiMahasiswa $prestasiMahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PrestasiMahasiswa  $prestasiMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(PrestasiMahasiswa $prestasiMahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PrestasiMahasiswa  $prestasiMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_prestasi' => 'required|string|max:255',
            'jenis_prestasi' => 'required|string|max:255',
            'tingkat_prestasi' => 'required|string|max:255',
            'tahun' => 'required',
        ]);

        if ($request->file('file_sertifikat')) {
            $request->validate([
                'file_sertifikat' => 'required|image|mimes:jpeg,png,jpg'
            ]);
        }

        $item = PrestasiMahasiswa::findOrFail($id);

        if($request->file('file_sertifikat')){
            $value = $request->file('file_sertifikat');
            $extension = $value->extension();
            $imageNames = uniqid('img_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/assets/file-sertifikat', $value, $imageNames);
        }else {
            $imageNames = $item->file_sertifikat;
        }

        $item->nama_prestasi = $request->nama_prestasi;
        $item->jenis_prestasi = $request->jenis_prestasi;
        $item->tingkat_prestasi = $request->tingkat_prestasi;
        $item->tahun = $request->tahun;
        $item->file_sertifikat = $imageNames;
        $item->save();

        return redirect()->route('prestasi-mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrestasiMahasiswa  $prestasiMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = PrestasiMahasiswa::findOrFail($id);

        $item->delete();

        return redirect()->route('prestasi-mahasiswa.index');
    }
}
