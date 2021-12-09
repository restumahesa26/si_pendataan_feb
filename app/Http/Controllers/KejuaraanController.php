<?php

namespace App\Http\Controllers;

use App\Models\Kejuaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KejuaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Kejuaraan::where('user_id', Auth::user()->id)->get();

        return view('pages.mahasiswa.kejuaraan.index', [
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
            'region' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'file_sertifikat' => 'required|image|mimes:jpeg,png,jpg|max:1024'
        ]);

        $value = $request->file('file_sertifikat');
        $extension = $value->extension();
        $imageNames = uniqid('img_', microtime()) . '.' . $extension;
        Storage::putFileAs('public/assets/file-sertifikat-kejuaraan', $value, $imageNames);

        Kejuaraan::create([
            'user_id' => Auth::user()->id,
            'penyelenggara' => $request->penyelenggara,
            'region' => $request->region,
            'tanggal' => $request->tanggal,
            'file_sertifikat' => $imageNames
        ]);

        return redirect()->route('kejuaraan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kejuaraan  $kejuaraan
     * @return \Illuminate\Http\Response
     */
    public function show(Kejuaraan $kejuaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kejuaraan  $kejuaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kejuaraan $kejuaraan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kejuaraan  $kejuaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'penyelenggara' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        if ($request->file('file_sertifikat')) {
            $request->validate([
                'file_sertifikat' => 'required|image|mimes:jpeg,png,jpg'
            ]);
        }

        $item = Kejuaraan::findOrFail($id);

        if($request->file('file_sertifikat')){
            $value = $request->file('file_sertifikat');
            $extension = $value->extension();
            $imageNames = uniqid('img_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/assets/file-sertifikat-kejuaraan', $value, $imageNames);
        }else {
            $imageNames = $item->file_sertifikat;
        }

        $item->update([
            'penyelenggara' => $request->penyelenggara,
            'region' => $request->region,
            'tanggal' => $request->tanggal,
            'file_sertifikat' => $imageNames
        ]);

        return redirect()->route('kejuaraan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kejuaraan  $kejuaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Kejuaraan::findOrFail($id);

        $item->delete();

        return redirect()->route('kejuaraan.index');
    }
}
