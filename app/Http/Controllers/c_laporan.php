<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\keranjang;



class c_laporan extends Controller
{
    public function __construct()
    {
        $this->transaksi = new transaksi();
        $this->keranjang = new keranjang();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('laporan.index');
    }

    public function read()
    {
        return view('laporan.read');
    }

    public function table()
    {
        $data = [
            'transaksi' => $this->transaksi->allData(),
        ];
        return view('laporan.table', $data);
    }

    public function cari($cari)
    {
        $cari = explode(" " , $cari);
            $data = [
                'transaksi' => $this->transaksi->cariData($cari),
            ];
        return view('laporan.table', $data);
    }

    
    public function carix(Request $request)
    {
            $data = $request->ex;
            dd($data);
            // $data = [
            //     'transaksi' => $this->transaksi->cariData2($fromDate, $toDate),
            // ];
            // return $data;
        return view('laporan.table', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        return view('laporan.search');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $test = $this->kategori->jumlahData();
    //     if ($test <> 0) {
    //         $cek = $this->kategori->allData();
    //         foreach ($cek as $ceks) {
    //            if ($ceks->kategori == $request->kategori) {
    //                $a = 2;
    //                break;
    //            } else {
    //                $a = 1;
    //            }
    //         }
    //            if ($a == 1) {
    //             $data = [
    //                 'kategori' => $request->kategori,
    //             ];
    //             $this->kategori->addData($data);
    //            }
    //     } else {
    //     $a = 1;
    //     $data = [
    //         'kategori' => $request->kategori,
    //     ];
    //     $this->kategori->addData($data);
    //     };

    //     $data = $a;
    //     return response()->json($data);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function delete($id)
    // {
    //     $data = [
    //         'kategori' => $this->kategori->detailData($id),
    //     ];
    //     return view('kategori.delete', $data);
    // }

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
            'transaksi' => $this->transaksi->transaksiDaata($id_transaksi),
            'keranjang' => $this->keranjang->Data($id_transaksi),

        ];
        return view('laporan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $data = [
    //         'kategori' => $request->kategori,
    //     ];
    //     $this->kategori->editData($id, $data);
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     $this->kategori->deleteData($id);
    // }
}
