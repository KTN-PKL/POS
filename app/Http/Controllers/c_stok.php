<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stok;
use App\Models\kategori;

class c_stok extends Controller
{
    public function __construct()
    {
        $this->kategori = new kategori();
        $this->stok = new stok();
    }

    public function index()
    {
        return view('stok.index');
    }

    public function cekstok()
    {
        $k = 0;
        $cek = $this->stok->allData();
        foreach ($cek as $test) {
            if ($test->stok < $test->min) {
               $k = $k + 1;
            }
        }
        return $k;
    }

    public function stokmin()
    {
        $k = 0;
        $cek = $this->stok->allData();
        foreach ($cek as $test) {
            if ($test->stok < $test->min) {
               $isi[$k] = $test;
            }
        }
        $data = [
            'stok' => $isi,
        ];
        return view('stok.table', $data);
    }

    public function read()
    {
        $data = [
            'kategori' => $this->kategori->allData(),
        ];
        return view('stok.read', $data);
    }

    public function table()
    {
        $data = [
            'stok' => $this->stok->allData(),
        ];
        return view('stok.table', $data);
    }

    public function edit($id)
    {
        $data = [
            'stok' => $this->stok->detailData($id),
        ];
        return view('stok.edit', $data);
    }

    public function tambah(Request $request, $id)
    {
        $cek = $this->stok->detailData($id);
        $stok  = $cek->stok + $request->stok;
        $data = [
            'stok' => $stok,
        ];
        $this->stok->editData($id, $data);
    }

    public function kategori($id)
    {
        $data = [
            'stok' => $this->stok->kategoriData($id),
        ];
        return view('stok.table', $data);
    }

    public function cari(Request $request)
    {
        $id = $request->id;
        $cari = explode(" " , $request->cari);
        if ($id == 0) {
            $data = [
                'stok' => $this->stok->cariData0($cari),
            ];
        } else {
            $cek = $this->stok->cariData($id, $cari);
            $data = [
                'stok' => $cek,
            ];
        }
        return view('stok.table', $data);
    }
}
