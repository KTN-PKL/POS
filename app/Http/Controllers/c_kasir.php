<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;
use App\Models\kategori;
use App\Models\stok;
use App\Models\keranjang;
use App\Models\transaksi;

class c_kasir extends Controller
{
    public function __construct()
    {
        $this->item = new item();
        $this->kategori = new kategori();
        $this->stok = new stok();
        $this->keranjang = new keranjang();
        $this->transaksi = new transaksi();
    }

    public function index()
    {
        return view('kasir.index');
    }

    public function read()
    {
        $data = [
            'kategori' => $this->kategori->allData(),
        ];
        return view('kasir.read', $data);
    }

    public function keranjang($id)
    {
        $data = [
            'keranjang' => $this->keranjang->Data($id),
        ];
        return view('kasir.barang', $data);
    }

    public function table()
    {
        $data = [
            'item' => $this->item->allData(),
        ];
        return view('kasir.table', $data);
    }

    public function kategori($id)
    {
        $data = [
            'item' => $this->item->kategoriData($id),
        ];
        return view('kasir.table', $data);
    }

    public function cari(Request $request)
    {
        $id = $request->id;
        $cari = explode(" " , $request->cari);
        if ($id == 0) {
            $data = [
                'item' => $this->item->cariData0($cari),
            ];
        } else {
            $cek = $this->item->cariData($id, $cari);
            $data = [
                'item' => $cek,
            ];
        }
        return view('kasir.table', $data);
    }

    public function hitung($id)
    {
        $data = [
            'total' => $this->keranjang->total($id),
        ];
        return view('kasir.hitung', $data);
    }

    public function transaksi()
    {
        $id = $this->transaksi->kasir();
        $data = [
            'id' => $id,
            'total' => $this->keranjang->total($id->id_transaksi),
        ];
        return view('kasir.keranjang', $data);
    }

    public function tambahbarang(Request $request)
    {
        $id_item = "ITM" . sprintf("%03s", $request->id_item);
        $cek = $this->keranjang->jumlahData($request->id_transaksi, $id_item);
        $item = $this->item->detailData($id_item);
        $stok = $this->stok->itemData($id_item);
        if ($stok->stok <> 0) {
            if ($cek == 0) {
                $data = [
                    'id_transaksi' => $request->id_transaksi,
                    'id_item' => $id_item,
                    'qty' => 1,
                    'subtotal' => $item->jual,
                ];
                $this->keranjang->addData($data);
                $isi = $stok->stok - 1;
                $data = [
                    'stok' => $isi,
                ];
                $this->stok->editData($stok->id_stok, $data);
    
            } else {
                $qty = $this->keranjang->cekData($request->id_transaksi, $id_item);
                $jumlah = $qty->qty + 1;
                $subtotal = $jumlah * $item->jual;
                $data = [
                    'qty' => $jumlah,
                    'subtotal' => $subtotal,
                ];
                $this->keranjang->updateData($request->id_transaksi, $id_item, $data);
                $isi = $stok->stok - 1;
                $data = [
                    'stok' => $isi,
                ];
                $this->stok->editData($stok->id_stok, $data);
        }
        }

        
    }
    
    public function ubahqty(Request $request)
    {
        $id_item = "ITM" . sprintf("%03s", $request->id_item);
        $item = $this->item->detailData($id_item);
        $qty = $this->keranjang->cekData($request->id_transaksi, $id_item);
        $qtya = $qty->qty;
        $stok = $this->stok->itemData($id_item);
            $jumlah = $request->qty;
            $isi = $stok->stok + $qtya;
            if ($isi > $jumlah) {
                $isi = $isi - $jumlah;
                $subtotal = $jumlah * $item->jual;
                $data = [
                    'qty' => $jumlah,
                    'subtotal' => $subtotal,
                ];
                $this->keranjang->updateData($request->id_transaksi, $id_item, $data);
                $data = [
                    'stok' => $isi,
                ];
                $this->stok->editData($stok->id_stok, $data);
            }
    }
    
}
