<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
                'npm' => 'required|string|max:255',
                'prodi' => 'required|string|max:255',
                'angkatan' => 'required|string|max:255'
            ]);

            $item->update([
                'jenis_kelamin' => $request->jenis_kelamin,
                'npm' => $request->npm,
                'prodi' => $request->prodi,
                'angkatan' => $request->angkatan
            ]);

            $user->update([
                'nama' => $request->nama
            ]);
        }elseif (Auth::user()->role === 'ALUMNI') {
            $item = Alumni::where('user_id', Auth::user()->id)->first();
            $user = User::where('id', Auth::user()->id)->first();

            $request->validate([
                'nama' => 'required|string|max:255',
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

            $item->update([
                'jenis_kelamin' => $request->jenis_kelamin,
                'npm' => $request->npm,
                'prodi' => $request->prodi,
                'angkatan' => $request->angkatan,
                'tanggal_lulus' => $request->tanggal_lulus,
                'lama_studi' => $request->lama_studi,
                'ipk' => $request->ipk,
                'status_bekerja' => $request->status_bekerja,
                'tempat_bekerja' => $request->tempat_bekerja,
                'pendidikan_terakhir' => $request->pendidikan_terakhir,
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
