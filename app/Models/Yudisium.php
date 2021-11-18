<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yudisium extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'nama', 'npm', 'prodi', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'no_hp', 'nama_ayah', 'nama_ibu', 'masa_studi', 'umur', 'pas_photo'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
