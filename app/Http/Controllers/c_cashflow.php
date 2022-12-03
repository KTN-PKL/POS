<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\keranjang;

class c_cashflow extends Controller
{
    public function __construct()
    {
        $this->keranjang = new keranjang();
        $this->transaksi = new transaksi();
    }

    public function index1()
    {
        $data = [
            'view' => "all",
        ];
        return view('cashflow.index', $data);
    }
    public function read(Request $request)
    {
        $hitung = $this->keranjang->jumlahmodal($request->tanggal);
        $modal = 0;
        foreach ($hitung as $item) {
            $kali = $item->beli * $item->qty;
            $modal = $modal + $kali;
        }
        $gt = $this->transaksi->jumlahgt($request->tanggal);
        $operasional = $gt - $modal;
        $pemasukan =  $this->keuangan->pemasukantgl($request->tanggal);
        $pengeluaran =  $this->keuangan->pengeluarantgl($request->tanggal);
        $data = [
            'gt' => $gt,
            'modal' => $modal,
            'operasional' => $operasional,
        ];
        return view('cashflow.read', $data);
    }


}
