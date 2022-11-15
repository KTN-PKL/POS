<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_kasir extends Controller
{
    public function index()
    {
        return view('kasir.index');
    }

    public function read()
    {
        return view('kasir.read');
    }

    public function table()
    {
        // $data = [
        //     'kategori' => $this->kategori->allData(),
        // ];
        return view('kasir.table');
    }

    public function cari($cari)
    {
        $cari = explode(" " , $cari);
            $data = [
                'kategori' => $this->kategori->cariData($cari),
            ];
        return view('kategori.table', $data);
    }
}
