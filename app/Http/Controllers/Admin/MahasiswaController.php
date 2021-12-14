<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Mahasiswa::orderBy('angkatan', 'asc')->get();

        return view('pages.admin.data-mahasiswa.index', [
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
        return view('pages.admin.data-mahasiswa.create');
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
            'riwayat_pendidikan_sd' => 'required|string|max:255',
            'riwayat_pendidikan_smp' => 'required|string|max:255',
            'riwayat_pendidikan_sma' => 'required|string|max:255',
        ]);

        if ($request->file('file_riwayat_pendidikan_sd')) {
            $value = $request->file('file_riwayat_pendidikan_sd');
            $extension = $value->extension();
            $imageNames = uniqid('img_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/assets/file-riwayat-pendidikan-sd', $value, $imageNames);
        }else{
            $imageNames = NULL;
        }

        if ($request->file('file_riwayat_pendidikan_smp')) {
            $value2 = $request->file('file_riwayat_pendidikan_smp');
            $extension2 = $value2->extension();
            $imageNames2 = uniqid('img_', microtime()) . '.' . $extension2;
            Storage::putFileAs('public/assets/file-riwayat-pendidikan-smp', $value2, $imageNames2);
        }else{
            $imageNames2 = NULL;
        }

        if ($request->file('file_riwayat_pendidikan_sma')) {
            $value3 = $request->file('file_riwayat_pendidikan_sma');
            $extension3 = $value3->extension();
            $imageNames3 = uniqid('img_', microtime()) . '.' . $extension3;
            Storage::putFileAs('public/assets/file-riwayat-pendidikan-sma', $value3, $imageNames3);
        }else{
            $imageNames3 = NULL;
        }

        if ($request->file('scan_ktp')) {
            $value4 = $request->file('scan_ktp');
            $extension4 = $value4->extension();
            $imageNames4 = uniqid('img_', microtime()) . '.' . $extension4;
            Storage::putFileAs('public/assets/scan-ktp', $value4, $imageNames4);
        }else{
            $imageNames4 = NULL;
        }

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Mahasiswa::create([
            'user_id' => $user->id,
            'npm' => $request->npm,
            'jenis_kelamin' => $request->jenis_kelamin,
            'prodi' => $request->prodi,
            'angkatan' => $request->angkatan,
            'riwayat_pendidikan_sd' => $request->riwayat_pendidikan_sd,
            'riwayat_pendidikan_smp' => $request->riwayat_pendidikan_smp,
            'riwayat_pendidikan_sma' => $request->riwayat_pendidikan_sma,
            'file_riwayat_pendidikan_sd' => $imageNames,
            'file_riwayat_pendidikan_smp' => $imageNames2,
            'file_riwayat_pendidikan_sma' => $imageNames3,
            'scan_ktp' => $imageNames4,
        ]);

        return redirect()->route('data-mahasiswa.index')->with(['success' => 'Sukses Menambah Data Mahasiswa']);
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
        $item = Mahasiswa::findOrFail($id);

        return view('pages.admin.data-mahasiswa.edit', [
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
            'riwayat_pendidikan_sd' => 'required|string|max:255',
            'riwayat_pendidikan_smp' => 'required|string|max:255',
            'riwayat_pendidikan_sma' => 'required|string|max:255',
        ]);

        $item = Mahasiswa::findOrFail($id);

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

        if ($request->file('file_riwayat_pendidikan_sd')) {
            $value = $request->file('file_riwayat_pendidikan_sd');
            $extension = $value->extension();
            $imageNames = uniqid('img_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/assets/file-riwayat-pendidikan-sd', $value, $imageNames);
        }else {
            $imageNames = $item->file_riwayat_pendidikan_sd;
        }

        if ($request->file('file_riwayat_pendidikan_smp')) {
            $value2 = $request->file('file_riwayat_pendidikan_smp');
            $extension2 = $value2->extension();
            $imageNames2 = uniqid('img_', microtime()) . '.' . $extension2;
            Storage::putFileAs('public/assets/file-riwayat-pendidikan-smp', $value2, $imageNames2);
        }else {
            $imageNames2 = $item->file_riwayat_pendidikan_smp;
        }

        if ($request->file('file_riwayat_pendidikan_sma')) {
            $value3 = $request->file('file_riwayat_pendidikan_sma');
            $extension3 = $value3->extension();
            $imageNames3 = uniqid('img_', microtime()) . '.' . $extension3;
            Storage::putFileAs('public/assets/file-riwayat-pendidikan-sma', $value3, $imageNames3);
        }else {
            $imageNames3 = $item->file_riwayat_pendidikan_sma;
        }

        if ($request->file('scan_ktp')) {
            $value4 = $request->file('scan_ktp');
            $extension4 = $value4->extension();
            $imageNames4 = uniqid('img_', microtime()) . '.' . $extension4;
            Storage::putFileAs('public/assets/scan-ktp', $value4, $imageNames4);
        }else {
            $imageNames4 = $item->scan_ktp;
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
        $item->riwayat_pendidikan_sd = $request->riwayat_pendidikan_sd;
        $item->riwayat_pendidikan_smp = $request->riwayat_pendidikan_smp;
        $item->riwayat_pendidikan_sma = $request->riwayat_pendidikan_sma;
        $item->file_riwayat_pendidikan_sd = $imageNames;
        $item->file_riwayat_pendidikan_smp = $imageNames2;
        $item->file_riwayat_pendidikan_sma = $imageNames3;
        $item->scan_ktp = $imageNames4;
        $item->save();

        return redirect()->route('data-mahasiswa.index')->with(['success' => 'Sukses Mengubah Data Mahasiswa']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Mahasiswa::findOrFail($id);
        $idd = $item->id;
        $item2 = Mahasiswa::findOrFail($idd);

        $item->delete();
        $item2->user->delete();

        return redirect()->route('data-mahasiswa.index')->with(['success' => 'Sukses Menghapus Data Mahasiswa']);
    }

    public function to_alumni($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $idd = $mahasiswa->user_id;

        Alumni::create([
            'user_id' => $idd,
            'npm' => $mahasiswa->npm,
            'jenis_kelamin' => $mahasiswa->jenis_kelamin,
            'prodi' => $mahasiswa->prodi,
            'angkatan' => $mahasiswa->angkatan,
            'riwayat_pendidikan_sd' => $mahasiswa->riwayat_pendidikan_sd,
            'riwayat_pendidikan_smp' => $mahasiswa->riwayat_pendidikan_smp,
            'riwayat_pendidikan_sma' => $mahasiswa->riwayat_pendidikan_sma,
            'file_riwayat_pendidikan_sd' => $mahasiswa->file_riwayat_pendidikan_sd,
            'file_riwayat_pendidikan_smp' => $mahasiswa->file_riwayat_pendidikan_smp,
            'file_riwayat_pendidikan_sma' => $mahasiswa->file_riwayat_pendidikan_sma,
        ]);

        $user = User::findOrFail($idd);
        $user->role = 'ALUMNI';
        $user->save();

        $mahasiswa->delete();

        return redirect()->route('data-alumni.index');
    }
}
