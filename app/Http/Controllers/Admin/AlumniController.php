<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AlumniExport;
use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Maatwebsite\Excel\Facades\Excel;

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
            'tanggal_masuk' => 'required|date',
            'ipk' => 'required',
            'pekerjaan' => 'required|string|max:255',
            'riwayat_pendidikan_sd' => 'required|string|max:255',
            'riwayat_pendidikan_smp' => 'required|string|max:255',
            'riwayat_pendidikan_sma' => 'required|string|max:255',
        ]);

        if ($request->file_riwayat_pendidikan_sd) {
            $value = $request->file('file_riwayat_pendidikan_sd');
            $extension = $value->extension();
            $imageNames = uniqid('img_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/assets/file-riwayat-pendidikan-sd', $value, $imageNames);
        }else {
            $imageNames = NULL;
        }

        if ($request->file_riwayat_pendidikan_smp) {
            $value2 = $request->file('file_riwayat_pendidikan_smp');
            $extension2 = $value2->extension();
            $imageNames2 = uniqid('img_', microtime()) . '.' . $extension2;
            Storage::putFileAs('public/assets/file-riwayat-pendidikan-smp', $value2, $imageNames2);
        }else {
            $imageNames2 = NULL;
        }

        if ($request->file_riwayat_pendidikan_sma) {
            $value3 = $request->file('file_riwayat_pendidikan_sma');
            $extension3 = $value3->extension();
            $imageNames3 = uniqid('img_', microtime()) . '.' . $extension3;
            Storage::putFileAs('public/assets/file-riwayat-pendidikan-sma', $value3, $imageNames3);
        }else {
            $imageNames3 = NULL;
        }

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
            'ipk' => $request->ipk,
            'pekerjaan' => $request->pekerjaan,
            'tempat_pekerjaan' => $request->tempat_pekerjaan,
            'tanggal_mulai_bekerja' => $request->tanggal_mulai_bekerja,
            'riwayat_pendidikan_sd' => $request->riwayat_pendidikan_sd,
            'riwayat_pendidikan_smp' => $request->riwayat_pendidikan_smp,
            'riwayat_pendidikan_sma' => $request->riwayat_pendidikan_sma,
            'file_riwayat_pendidikan_sd' => $imageNames,
            'file_riwayat_pendidikan_smp' => $imageNames2,
            'file_riwayat_pendidikan_sma' => $imageNames3,
        ]);

        return redirect()->route('data-alumni.index')->with(['success' => 'Sukses Menambah Data Alumni']);
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
            'tanggal_masuk' => 'required|date',
            'ipk' => 'required',
            'pekerjaan' => 'required|string|max:255',
            'riwayat_pendidikan_sd' => 'required|string|max:255',
            'riwayat_pendidikan_smp' => 'required|string|max:255',
            'riwayat_pendidikan_sma' => 'required|string|max:255',
        ]);

        $item = Alumni::findOrFail($id);

        if ($request->file_riwayat_pendidikan_sd) {
            $value = $request->file('file_riwayat_pendidikan_sd');
            $extension = $value->extension();
            $imageNames = uniqid('img_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/assets/file-riwayat-pendidikan-sd', $value, $imageNames);
        }else {
            $imageNames = $item->file_riwayat_pendidikan_sd;
        }

        if ($request->file_riwayat_pendidikan_smp) {
            $value2 = $request->file('file_riwayat_pendidikan_smp');
            $extension2 = $value2->extension();
            $imageNames2 = uniqid('img_', microtime()) . '.' . $extension2;
            Storage::putFileAs('public/assets/file-riwayat-pendidikan-smp', $value2, $imageNames2);
        }else {
            $imageNames2 = $item->file_riwayat_pendidikan_smp;
        }

        if ($request->file_riwayat_pendidikan_sma) {
            $value3 = $request->file('file_riwayat_pendidikan_sma');
            $extension3 = $value3->extension();
            $imageNames3 = uniqid('img_', microtime()) . '.' . $extension3;
            Storage::putFileAs('public/assets/file-riwayat-pendidikan-sma', $value3, $imageNames3);
        }else {
            $imageNames3 = $item->file_riwayat_pendidikan_sma;
        }

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
        $item->ipk = $request->ipk;
        $item->pekerjaan = $request->pekerjaan;
        $item->tempat_pekerjaan = $request->tempat_pekerjaan;
        $item->tanggal_mulai_bekerja = $request->tanggal_mulai_bekerja;
        $item->tanggal_masuk = $request->tanggal_masuk;
        $item->tanggal_lulus = $request->tanggal_lulus;
        $item->riwayat_pendidikan_sd = $request->riwayat_pendidikan_sd;
        $item->riwayat_pendidikan_smp = $request->riwayat_pendidikan_smp;
        $item->riwayat_pendidikan_sma = $request->riwayat_pendidikan_sma;
        $item->file_riwayat_pendidikan_sd = $imageNames;
        $item->file_riwayat_pendidikan_smp = $imageNames2;
        $item->file_riwayat_pendidikan_sma = $imageNames3;
        $item->save();

        return redirect()->route('data-alumni.index')->with(['success' => 'Sukses Mengubah Data Alumni']);
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

        return redirect()->route('data-alumni.index')->with(['success' => 'Sukses Menghapus Data Alumni']);
    }

    public function export_excel()
    {
        return Excel::download(new AlumniExport, 'alumni.xlsx');
    }
}
