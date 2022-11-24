<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\keuangan;
use App\Models\akuntansi;

class c_keuangan extends Controller
{
    public function __construct()
    {
        $this->keuangan = new keuangan();
        $this->akuntansi = new akuntansi();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('keuangan.index');
    }

    public function read()
    {
        return view('keuangan.read');
    }

    public function table()
    {
        $data = [
            'keuangan' => $this->keuangan->allData(),
            'pengeluaran' => $this->keuangan->pengeluaran(),
            'pemasukan' => $this->keuangan->pemasukan(),
        ];
        return view('keuangan.table', $data);
    }

    public function jenis($id)
    {
        $data = $this->akuntansi->detailData($id);
        return $data->jenis;
    }

    public function cari($cari)
    {
        $cari = explode(" " , $cari);
            $data = [
                'keuangan' => $this->keuangan->cariData($cari),
                'pengeluaran' => $this->keuangan->pengeluarancari($cari),
                'pemasukan' => $this->keuangan->pemasukancari($cari),
            ];
        return view('keuangan.table', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'akun' => $this->akuntansi->allData(),
        ];
        return view('keuangan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->id_akun <> null) {$b = 1;
            if ($request->uang <> null) {$a = 1;} else {$a = 2;}
        } else {$b = 2;}
        if ($request->keterangan <> null) {$c = 1;} else {$c = 2;}
        if ($b == 1) {
            if ($a == 1 && $c == 1) {
                date_default_timezone_set("Asia/Jakarta");
                $d = date("Y-m-d H:i:s");
                $run = explode("." , $request->uang);
                $go = count($run);
                $uang = $run[0];
                for ($i=1; $i < $go; $i++) { 
                    $uang = $uang.$run[$i];
                }
                $data = [
                    'id_akun' => $request->id_akun,
                    'uang' => $uang,
                    'keterangan' => $request->keterangan,
                    'waktu' => $d,
                ];
                $this->keuangan->addData($data);
               }
                $data['required3'] = $a;
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
        $data = [
            'keuangan' => $this->keuangan->detailData($id),
        ];
        return view('keuangan.edit', $data);
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
        if ($request->uang <> null) {$a = 1;} else {$a = 2;}
        if ($request->keterangan <> null) {$c = 1;} else {$c = 2;}
        if ($a == 1 && $c == 1) {
        $run = explode("." , $request->uang);
                $go = count($run);
                $uang = $run[0];
                for ($i=1; $i < $go; $i++) { 
                    $uang = $uang.$run[$i];
                }
        $data = [
            'uang' => $uang,
            'keterangan' => $request->keterangan,
        ];
        $this->keuangan->editData($id, $data);
        }
        $data['required1'] = $a;
        $data['required2'] = $c;
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->keuangan->deleteData($id);
    }
}
