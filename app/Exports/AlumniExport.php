<?php

namespace App\Exports;

use App\Models\Alumni;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AlumniExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Alumni::with(['user'])->get();
    }

    public function map($alumni): array
    {
        return [
            $alumni->id,
            $alumni->user->nama,
            $alumni->npm,
            $alumni->jenis_kelamin,
            $alumni->prodi,
            $alumni->angkatan,
            Carbon::parse($alumni->tanggal_masuk)->translatedFormat('d F Y'),
            Carbon::parse($alumni->tanggal_lulus)->translatedFormat('d F Y'),
            $alumni->ipk,
            $alumni->pekerjaan,
            $alumni->tempat_pekerjaan,
            $alumni->tempat_pekerjaan ? Carbon::parse($alumni->tanggal_mulai_bekerja)->translatedFormat('d F Y') : '-',
            $alumni->user->email,
        ];
    }

    public function headings(): array
    {
        return [
            'Id',
            'Nama',
            'NPM',
            'Jenis Kelamin',
            'Prodi',
            'Angkatan',
            'Tanggal Masuk',
            'Tanggal Lulus',
            'IPK',
            'Status Bekerja',
            'Instansi / Perusahaan Bekerja',
            'Tanggal Mulai Bekerja / Usaha',
            'Email',
        ];
    }
}
