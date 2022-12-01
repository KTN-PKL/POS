<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\keranjang;

class c_order extends Controller
{
    public function __construct()
    {
        $this->keranjang = new keranjang();
        $this->transaksi = new transaksi();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        $data = [
            'view' => "all",
        ];
        return view('order.index', $data);
    }
    public function index2()
    {
        $data = [
            'view' => "booking",
        ];
        return view('order.index', $data);
    }
    public function index3()
    {
        $data = [
            'view' => "ditempat",
        ];
        return view('order.index', $data);
    }
    public function index4()
    {
        $data = [
            'view' => "delivery",
        ];
        return view('order.index', $data);
    }
    public function index5()
    {
        $data = [
            'view' => "bayarnanti",
        ];
        return view('order.index', $data);
    }

    public function read()
    {
        return view('order.read');
    }

    public function table($id)
    {
        switch ($id) {
            case 'all':
                $data = [
                    'transaksi' => $this->transaksi->allData(),
                ];
                break;
            case 'ditempat':
                $data = [
                    'transaksi' => $this->transaksi->orderData("Ditempat"),
                ];
                break;
            case 'booking':
                $data = [
                    'transaksi' => $this->transaksi->orderData("Booking"),
                ];
                break;
            case 'delivery':
                $data = [
                    'transaksi' => $this->transaksi->orderData("Delivery"),
                ];
                break;
            default:
                $data = [
                    'transaksi' => $this->transaksi->nantiData(),
                ];
                break;
        }
        return view('order.table', $data);
    }

    public function cari(Request $request)
    {
        $id = $request->id;
        $cari = explode(" " , $request->cari);
        
        $cek = $this->transaksi->cariDatao($id, $cari);
        $data = [
            'item' => $cek,
        ];
        return view('order.table', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $huruf = "TRS";
        $id_transaksi = $huruf . sprintf("%03s", $id);
        $data = [
            'transaksi' => $this->transaksi->detailData($id_transaksi),
        ];
        return view('order.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->kembalian >= 0) {
            $huruf = "TRS";
        $id_transaksi = $huruf . sprintf("%03s", $id);
        $data = [
            'bayar' => $request->bayar,
            'kembali' => $request->kembalian,
            'status' => "Lunas",
        ];
        $this->transaksi->updateData($id_transaksi, $data);
        } else {
            return 1;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $huruf = "TRS";
        $id_transaksi = $huruf . sprintf("%03s", $id);
        $this->transaksi->deleteData($id_transaksi);
    }

    public function show($id)
    {
        $huruf = "TRS";
        $id_transaksi = $huruf . sprintf("%03s", $id);
        $data = [
            'transaksi' => $this->transaksi->transaksiDaata($id_transaksi),
            'keranjang' => $this->keranjang->Data($id_transaksi),
        ];
        return view('order.show', $data);
    }
}
