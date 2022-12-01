<?php

namespace App\Exports;

use App\Models\transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class transaksiExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return transaksi::all();
    }

    public function headings():array
    {
        return[
            'No BON',
            'Total',
            'Customer',
            'Kasir',
            'Tanggal',
            'Jenis Order',
            'Status',
            'Grand Total',
        ];
    }
}
