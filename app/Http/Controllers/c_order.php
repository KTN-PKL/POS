<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\transaksi;

class c_order extends Controller
{
    public function __construct()
    {
        $this->order = new order();
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

    public function cari($cari)
    {
        $cari = explode(" " , $cari);
            $data = [
                'order' => $this->order->cariData($cari),
            ];
        return view('order.table', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->akun <> null) {
            $b = 1;
            $test = $this->order->jumlahData();
        if ($test <> 0) {
            $cek = $this->order->allData();
            foreach ($cek as $ceks) {
               if ($ceks->akun == $request->akun) {
                   $a = 2;
                   break;
               } else {
                   $a = 1;
               }
            }    
        } else {
        $a = 1;
        }
        } else {$b = 2;}
        if ($request->jenis <> null) {$c = 1;} else {$c = 2;}
        if ($b == 1) {
            if ($a == 1 && $c == 1) {
                $data = [
                    'akun' => $request->akun,
                    'jenis' => $request->jenis,
                ];
                $this->order->addData($data);
               }
                $data['unique'] = $a;
        }

        $data['required1'] = $b;
        $data['required2'] = $c;
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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
            'transaksi' => $this->order->detailData($id_transaksi),
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
        $this->order->deleteData($id_transaksi);
    }
}
