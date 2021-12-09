<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'npm', 'prodi', 'angkatan', 'jenis_kelamin', 'riwayat_pendidikan_sd', 'riwayat_pendidikan_smp', 'riwayat_pendidikan_sma', 'file_riwayat_pendidikan_sd', 'file_riwayat_pendidikan_smp', 'file_riwayat_pendidikan_sma', 'scan_ktp'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
