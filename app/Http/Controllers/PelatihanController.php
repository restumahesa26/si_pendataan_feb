<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Pelatihan::where('user_id', Auth::user()->id)->get();

        return view('pages.mahasiswa.pelatihan.index', [
            'items' => $items
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
            'penyelenggara' => 'required|string|max:255',
            'durasi' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'file_sertifikat' => 'required|image|mimes:jpeg,png,jpg|max:1024'
        ]);

        $value = $request->file('file_sertifikat');
        $extension = $value->extension();
        $imageNames = uniqid('img_', microtime()) . '.' . $extension;
        Storage::putFileAs('public/assets/file-sertifikat-pelatihan', $value, $imageNames);

        Pelatihan::create([
            'user_id' => Auth::user()->id,
            'penyelenggara' => $request->penyelenggara,
            'durasi' => $request->durasi,
            'region' => $request->region,
            'tanggal' => $request->tanggal,
            'file_sertifikat' => $imageNames
        ]);

        return redirect()->route('pelatihan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelatihan $pelatihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelatihan $pelatihan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'penyelenggara' => 'required|string|max:255',
            'durasi' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        if ($request->file('file_sertifikat')) {
            $request->validate([
                'file_sertifikat' => 'required|image|mimes:jpeg,png,jpg'
            ]);
        }

        $item = Pelatihan::findOrFail($id);

        if($request->file('file_sertifikat')){
            $value = $request->file('file_sertifikat');
            $extension = $value->extension();
            $imageNames = uniqid('img_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/assets/file-sertifikat-pelatihan', $value, $imageNames);
        }else {
            $imageNames = $item->file_sertifikat;
        }

        $item->update([
            'penyelenggara' => $request->penyelenggara,
            'durasi' => $request->durasi,
            'region' => $request->region,
            'tanggal' => $request->tanggal,
            'file_sertifikat' => $imageNames
        ]);

        return redirect()->route('pelatihan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Pelatihan::findOrFail($id);

        $item->delete();

        return redirect()->route('pelatihan.index');
    }

    public function download($filename)
    {
        $file_path = public_path('storage/assets/file-sertifikat-pelatihan/' . $filename);
        return response()->download($file_path);
    }
}
