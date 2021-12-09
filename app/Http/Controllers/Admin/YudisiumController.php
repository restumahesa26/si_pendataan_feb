<?php

namespace App\Http\Controllers\Admin;

use App\Exports\YudisiumExport;
use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\Yudisium;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
            'angkatan' => $mahasiswa->angkatan,
            'riwayat_pendidikan_sd' => $mahasiswa->riwayat_pendidikan_sd,
            'riwayat_pendidikan_smp' => $mahasiswa->riwayat_pendidikan_smp,
            'riwayat_pendidikan_sma' => $mahasiswa->riwayat_pendidikan_sma,
            'file_riwayat_pendidikan_sd' => $mahasiswa->file_riwayat_pendidikan_sd,
            'file_riwayat_pendidikan_smp' => $mahasiswa->file_riwayat_pendidikan_smp,
            'file_riwayat_pendidikan_sma' => $mahasiswa->file_riwayat_pendidikan_sma,
        ]);

        $user = User::findOrFail($id_mahasiswa);
        $user->role = 'ALUMNI';
        $user->save();

        $mahasiswa->delete();

        return redirect()->route('data-yudisium.index')->with(['success' => 'Sukses Memindah Sebagai Alumni']);
    }

    public function destroy($id)
    {
        $item = Yudisium::findOrFail($id);

        $item->delete();

        return redirect()->route('data-yudisium.index');
    }

    public function export_excel()
    {
        return Excel::download(new YudisiumExport, 'yudisium.xlsx');
    }

    public function delete_all_data()
    {
        Yudisium::truncate();

        return redirect()->route('data-yudisium.index');
    }
}
