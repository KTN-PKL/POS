<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\akuntansi;

class c_akuntansi extends Controller
{
    public function __construct()
    {
        $this->akuntansi = new akuntansi();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('akuntansi.index');
    }

    public function read()
    {
        return view('akuntansi.read');
    }

    public function table()
    {
        $data = [
            'akuntansi' => $this->akuntansi->allData(),
        ];
        return view('akuntansi.table', $data);
    }

    public function cari($cari)
    {
        $cari = explode(" " , $cari);
            $data = [
                'akuntansi' => $this->akuntansi->cariData($cari),
            ];
        return view('akuntansi.table', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('akuntansi.create');
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
            $test = $this->akuntansi->jumlahData();
        if ($test <> 0) {
            $cek = $this->akuntansi->allData();
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
                $this->akuntansi->addData($data);
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
            'akuntansi' => $this->akuntansi->detailData($id),
        ];
        return view('akuntansi.edit', $data);
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
        if ($request->akun <> null) {
            $b = 1;
            $test = $this->akuntansi->jumlahData();
        if ($test <> 1) {
            $cek = $this->akuntansi->exallData($id);
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
        if ($b == 1) {
            if ($a == 1) {
                $data = [
                    'akun' => $request->akun,
                    'jenis' => $request->jenis,
                ];
                $this->akuntansi->editData($id, $data);
            }
            $data['unique'] = $a;
        }
        $data['required1'] = $b;
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
        $this->akuntansi->deleteData($id);
    }
}
