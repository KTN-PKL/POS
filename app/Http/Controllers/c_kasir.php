<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;
use App\Models\kategori;
use App\Models\stok;
use App\Models\keranjang;
use App\Models\transaksi;
use App\Models\customer;
use App\Models\pengaturan;
use App\Models\toko;

class c_kasir extends Controller
{
    public function __construct()
    {
        $this->item = new item();
        $this->kategori = new kategori();
        $this->stok = new stok();
        $this->keranjang = new keranjang();
        $this->toko = new toko();
        $this->pengaturan = new pengaturan();
        $this->transaksi = new transaksi();
        $this->customer = new customer();
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

    public function hitung()
    {
        $data = [
            'pengaturan' =>  $this->pengaturan->Data(),
        ];
        return view('kasir.hitung',$data);
    }

    public function nota($id)
    {
        $data = [
            'pengaturan' =>  $this->pengaturan->Data(),
            'toko' =>  $this->toko->Data(),
            'transaksi' => $this->transaksi->transaksiDaata($id),
            'keranjang' => $this->keranjang->Data($id),
        ];
        return view('kasir.nota',$data);
    }

    public function total($id)
    {
        $total = $this->keranjang->total($id);
        $isi = number_format($total,0,",",".");
        return $isi;
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
            $data = 1;
                return $data;
        }
        $data = 2;
        return $data;
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
    
    public function grandtotal(Request $request)
    {
        $t = (int) str_replace(".","",$request->total);
        $dr = ($request->discountrate * $t)/100;
        $pr = ($request->pajakrate * $t)/100;
        $d = (int) str_replace(".","",$request->discount);
        $p = (int) str_replace(".","",$request->pajak);
        $gt = $t - $dr + $pr - $d + $p;
        $isi = number_format($gt,0,",",".");
        return $isi;
    }

    public function kembalian(Request $request)
    {
        $gt = (int) str_replace(".","",$request->gt);
        $bayar = (int) str_replace(".","",$request->bayar);
        $hasil = $bayar - $gt;
        return $hasil;
    }

    public function customer()
    {
        $data = [
            'customer' => $this->customer->allData(),
        ];
        return view('kasir.customer', $data);
    }

    public function add($id)
    {
        $huruf = "CTM";
        $id_customer = $huruf . sprintf("%03s", $id);
        $data1 = $this->customer->detailData($id_customer);

        $data = [
            'nama' => $data1->nama,
            'id_customer' => $id_customer,
        ];
        return $data;
    }

    public function simpan(Request $request)
    {
        if ($request->atasnama ==null) {
            $data['success'] = 1;
        } 
        if ($request->atasnama ==null) {
            $data['success1'] = 1;
        } 
        if ($request->atasnama ==null || $request->atasnama ==null) {
            return response()->json($data);
        }else{
            $t = (int) str_replace(".","",$request->total);
            $gt = (int) str_replace(".","",$request->grandtotal);
            date_default_timezone_set("Asia/Jakarta");
                $d = date("Y-m-d H:i:s");
        $data = [
            'total' => $t,
            'id_customer' => $request->id_customer,
            'atasnama' => $request->atasnama,
            'grandtotal' => $gt,
            'discountrate' => $request->discountrate,
            'pajakrate' => $request->pajakrate,
            'discount' => $request->discount,
            'pajak' => $request->pajak,
            'status' => $request->status,
            'order' => $request->order,
            'bayar' => $request->bayar,
            'kembali' => $request->kembali,
            'waktut' => $d,
        ];
        $this->transaksi->updateData($request->id_transaksi, $data);
        $this->transaksi->genid();
    }
    }
}
