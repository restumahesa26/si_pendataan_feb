<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kejuaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'tanggal', 'penyelenggara', 'region', 'file_sertifikat'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
