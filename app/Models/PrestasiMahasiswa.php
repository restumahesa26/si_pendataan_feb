<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestasiMahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'nama_prestasi', 'jenis_prestasi', 'tingkat_prestasi', 'tahun', 'file_sertifikat'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
