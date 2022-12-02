<?php

namespace App\Exports;

use App\Models\transaksi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;

class transaksifilterExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return transaksi::all()->where('dikirim');
    // }
    public function __construct(string $ex, string $to)
    {
        $this->transaksi = new transaksi();
        $this->ex = $ex;
        $this->to = $to;
        
    }

    public function view(): View
    {
        return view('laporan.table', [
            'transaksi' => $this->transaksi->cariData2($this->ex, $this->to),
            'total'=> $this->transaksi->jumlahDuitFilter($this->ex, $this->to),
        ]);
    }
    // public function headings():array
    // {
    //     return[]
    // }
}
