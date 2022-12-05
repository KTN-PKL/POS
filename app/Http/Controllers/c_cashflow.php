<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\keranjang;
use App\Models\keuangan;

class c_cashflow extends Controller
{
    public function __construct()
    {
        $this->keuangan = new keuangan();
        $this->transaksi = new transaksi();
        $this->keranjang = new keranjang();
    }

    public function index()
    {
        return view('cashflow.index');
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
        $pemasukan =  $this->keuangan->pemasukantngl($request->tanggal);
        $pengeluaran =  $this->keuangan->pengeluarantngl($request->tanggal);
        $pendapatan = ($operasional + $pemasukan) - $pengeluaran;
        $data = [
            'gt' => $gt,
            'modal' => $modal,
            'operasional' => $operasional,
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,
            'pendapatan' => $pendapatan,
        ];
        return view('cashflow.read', $data);
    }


}
