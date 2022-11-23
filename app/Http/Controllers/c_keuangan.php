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
        if ($request->id_ <> null) {
            $b = 1;
            $test = $this->keuangan->jumlahData();
        if ($test <> 0) {
            $cek = $this->keuangan->allData();
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
                $this->keuangan->addData($data);
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
        $data = [
            'akun' => $request->akun,
            'jenis' => $request->jenis,
        ];
        $this->keuangan->editData($id, $data);
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
