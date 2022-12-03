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
        $data = [
            
        ]
    }


}
