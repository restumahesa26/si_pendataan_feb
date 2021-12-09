<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Organisasi::where('user_id', Auth::user()->id)->get();

        return view('pages.mahasiswa.organisasi.index', [
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
            'nama_organisasi' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);

        if ($request->file_sertifikat) {
            $value = $request->file('file_sertifikat');
            $extension = $value->extension();
            $imageNames = uniqid('img_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/assets/file-sertifikat-organisasi', $value, $imageNames);
        }else {
            $imageNames = NULL;
        }

        Organisasi::create([
            'user_id' => Auth::user()->id,
            'nama_organisasi' => $request->nama_organisasi,
            'jabatan' => $request->jabatan,
            'file_sertifikat' => $imageNames
        ]);

        return redirect()->route('organisasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function show(Organisasi $organisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Organisasi $organisasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_organisasi' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);

        if ($request->file('file_sertifikat')) {
            $request->validate([
                'file_sertifikat' => 'required|image|mimes:jpeg,png,jpg'
            ]);
        }

        $item = Organisasi::findOrFail($id);

        if($request->file('file_sertifikat')){
            $value = $request->file('file_sertifikat');
            $extension = $value->extension();
            $imageNames = uniqid('img_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/assets/file-sertifikat-organisasi', $value, $imageNames);
        }else {
            $imageNames = $item->file_sertifikat;
        }

        $item->update([
            'nama_organisasi' => $request->nama_organisasi,
            'jabatan' => $request->jabatan,
            'file_sertifikat' => $imageNames
        ]);

        return redirect()->route('organisasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Organisasi::findOrFail($id);

        $item->delete();

        return redirect()->route('organisasi.index');
    }
}
