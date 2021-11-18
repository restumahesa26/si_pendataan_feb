<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'npm', 'prodi', 'angkatan', 'jenis_kelamin', 'tanggal_lulus', 'lama_studi', 'ipk', 'status_bekerja', 'tempat_bekerja', 'pendidikan_terakhir'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
