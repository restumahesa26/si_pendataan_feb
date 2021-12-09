<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;

class ProfileControler extends Controller
{
    public function edit()
    {
        if (Auth::user()->role === 'MAHASISWA') {
            $user = Mahasiswa::where('user_id', Auth::user()->id)->first();
        }elseif (Auth::user()->role === 'ALUMNI') {
            $user = Alumni::where('user_id', Auth::user()->id)->first();
        }elseif (Auth::user()->role === 'ADMIN') {
            $user = User::findOrFail(Auth::user()->id);
        }
        return view('pages.profile', [
            'item' => $user
        ]);
    }

    public function update(Request $request)
    {
        if (Auth::user()->role === 'MAHASISWA') {
            $item = Mahasiswa::where('user_id', Auth::user()->id)->first();
            $user = User::where('id', Auth::user()->id)->first();

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

            $item->update([
                'jenis_kelamin' => $request->jenis_kelamin,
                'npm' => $request->npm,
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

            $user->update([
                'nama' => $request->nama
            ]);
        }elseif (Auth::user()->role === 'ALUMNI') {
            $item = Alumni::where('user_id', Auth::user()->id)->first();
            $user = User::where('id', Auth::user()->id)->first();

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

            $item->update([
                'jenis_kelamin' => $request->jenis_kelamin,
                'npm' => $request->npm,
                'prodi' => $request->prodi,
                'angkatan' => $request->angkatan,
                'tanggal_lulus' => $request->tanggal_lulus,
                'tanggal_masuk' => $request->tanggal_masuk,
                'ipk' => $request->ipk,
                'pekerjaan' => $request->pekerjaan,
                'tempat_pekerjaan' => $request->tempat_pekerjaan,
                'riwayat_pendidikan_sd' => $request->riwayat_pendidikan_sd,
                'riwayat_pendidikan_smp' => $request->riwayat_pendidikan_smp,
                'riwayat_pendidikan_sma' => $request->riwayat_pendidikan_sma,
                'file_riwayat_pendidikan_sd' => $imageNames,
                'file_riwayat_pendidikan_smp' => $imageNames2,
                'file_riwayat_pendidikan_sma' => $imageNames3,
            ]);

            $user->update([
                'nama' => $request->nama
            ]);
        }elseif (Auth::user()->role === 'ADMIN') {
            $user = User::where('id', Auth::user()->id)->first();

            $request->validate([
                'nama' => 'required|string|max:255'
            ]);

            if ($user->email != $request->email) {
                $request->validate([
                    'email' => 'required|email|string|max:255|unique:users',
                ]);
            }

            if ($request->password) {
                $request->validate([
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                ]);
            }

            $user->nama = $request->nama;
            $user->email = $request->email;
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            $user->save();
        }

        return redirect()->route('profile.edit');
    }
}
