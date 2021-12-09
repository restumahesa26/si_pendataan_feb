<?php

namespace App\Exports;

use App\Models\Yudisium;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class YudisiumExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Yudisium::all();
    }

    public function headings(): array
    {
        return [
            'Id',
            'User_id',
            'NPM',
            'Nama',
            'Prodi',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Alamat',
            'No. Handphone',
            'Nama Ayah',
            'Nama Ibu',
            'Masa Studi',
            'Umur',
            'Pas Photo',
            'IPK'
        ];
    }
}
