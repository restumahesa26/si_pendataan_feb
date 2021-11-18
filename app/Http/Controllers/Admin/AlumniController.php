<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Alumni::orderBy('angkatan', 'asc')->get();

        return view('pages.admin.data-alumni.index', [
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
        return view('pages.admin.data-alumni.create');
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
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'npm' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'angkatan' => 'required|string|max:255',
            'email' => 'required|email|string|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'tanggal_lulus' => 'required|date',
            'lama_studi' => 'required|numeric',
            'ipk' => 'required',
            'status_bekerja' => 'required|string|max:255',
            'tempat_bekerja' => 'required|string|max:255',
            'pendidikan_terakhir' => 'required|string|max:255',
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'role' => 'ALUMNI',
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Alumni::create([
            'user_id' => $user->id,
            'npm' => $request->npm,
            'jenis_kelamin' => $request->jenis_kelamin,
            'prodi' => $request->prodi,
            'angkatan' => $request->angkatan,
            'tanggal_lulus' => $request->tanggal_lulus,
            'lama_studi' => $request->lama_studi,
            'ipk' => $request->ipk,
            'status_bekerja' => $request->status_bekerja,
            'tempat_bekerja' => $request->tempat_bekerja,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
        ]);

        return redirect()->route('data-alumni.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Alumni::findOrFail($id);

        return view('pages.admin.data-alumni.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'npm' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'angkatan' => 'required|string|max:255',
            'tanggal_lulus' => 'required|date',
            'lama_studi' => 'required|numeric',
            'ipk' => 'required',
            'status_bekerja' => 'required|string|max:255',
            'tempat_bekerja' => 'required|string|max:255',
            'pendidikan_terakhir' => 'required|string|max:255',
        ]);

        $item = Alumni::findOrFail($id);

        if ($item->user->email != $request->email) {
            $request->validate([
                'email' => 'required|email|string|max:255|unique:users',
            ]);
        }

        if ($request->password) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
        }

        $item->user->nama = $request->nama;
        $item->user->email = $request->email;
        if ($request->password) {
            $item->user->password = Hash::make($request->password);
        }
        $item->npm = $request->npm;
        $item->jenis_kelamin = $request->jenis_kelamin;
        $item->prodi = $request->prodi;
        $item->angkatan = $request->angkatan;
        $item->tanggal_lulus = $request->tanggal_lulus;
        $item->lama_studi = $request->lama_studi;
        $item->ipk = $request->ipk;
        $item->status_bekerja = $request->status_bekerja;
        $item->tempat_bekerja = $request->tempat_bekerja;
        $item->pendidikan_terakhir = $request->pendidikan_terakhir;
        $item->save();

        return redirect()->route('data-alumni.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Alumni::findOrFail($id);
        $idd = $item->id;
        $item2 = Alumni::findOrFail($idd);

        $item->delete();
        $item2->user->delete();

        return redirect()->route('data-alumni.index');
    }
}
