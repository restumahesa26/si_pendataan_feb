<?php

namespace Database\Seeders;

use App\Models\Alumni;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'Mufti Restu Mahesa',
            'email' => 'mufti.restumahesa@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'ADMIN'
        ]);

        $alumni = User::create([
            'nama' => 'Andrei Jonior Gustari',
            'email' => 'andrei@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'ALUMNI'
        ]);

        $mahasiswa = User::create([
            'nama' => 'Muhammmad Hafiz',
            'email' => 'hafiz@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'MAHASISWA'
        ]);

        Mahasiswa::create([
            'user_id' => $mahasiswa->id,
            'npm' => 'G1A019040',
            'prodi' => 'Manajemen',
            'angkatan' => '2019',
        ]);

        Alumni::create([
            'user_id' => $alumni->id,
            'npm' => 'G1A016082',
            'prodi' => 'Manajemen',
            'angkatan' => '2016',
        ]);
    }
}
