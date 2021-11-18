<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'npm', 'prodi', 'angkatan', 'jenis_kelamin'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
