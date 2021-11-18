<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\Yudisium;
use Illuminate\Http\Request;

class YudisiumController extends Controller
{
    public function index()
    {
        $items = Yudisium::all();

        return view('pages.admin.data-yudisium.index', [
            'items' => $items
        ]);
    }

    public function to_alumni($id)
    {
        $item = Yudisium::findOrFail($id);
        $id_mahasiswa = $item->user_id;

        $mahasiswa = Mahasiswa::where('user_id', $id_mahasiswa)->first();

        Alumni::create([
            'user_id' => $id_mahasiswa,
            'npm' => $mahasiswa->npm,
            'jenis_kelamin' => $mahasiswa->jenis_kelamin,
            'prodi' => $mahasiswa->prodi,
            'angkatan' => $mahasiswa->angkatan
        ]);

        $user = User::findOrFail($id_mahasiswa);
        $user->role = 'ALUMNI';
        $user->save();

        $mahasiswa->delete();

        return redirect()->route('data-yudisium.index');
    }
}
