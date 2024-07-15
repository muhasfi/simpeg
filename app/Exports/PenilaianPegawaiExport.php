<?php

namespace App\Exports;

use App\Models\PenilaianPegawai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PenilaianPegawaiExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return PenilaianPegawai::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'ID Pegawai',
            'Tanggal',
            'Tanggung Jawab',
            'Inisiatif',
            'Teamwork',
            'Kedisiplinan',
            'Performa Kerja',
            'Ketepatan Waktu',
            'Koordinasi',
            'Motivasi Kerja',
            'Nilai Akhir',
        ];
    }
}
