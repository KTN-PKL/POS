<?php

namespace App\Exports;

use App\Models\transaksi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;

class transaksiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return transaksi::all()->where('dikirim');
    // }
    public function __construct()
    {
        $this->transaksi = new transaksi();
    }

    public function view(): View
    {
        return view('laporan.table', [
            'transaksi' => $this->transaksi->allData(),
        ]);
    }
    // public function headings():array
    // {
    //     return[]
    // }
}
