<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;



class c_kategori extends Controller
{
    public function __construct()
    {
        $this->kategori = new kategori();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kategori.index');
    }

    public function read()
    {
        return view('kategori.read');
    }

    public function table()
    {
        $data = [
            'kategori' => $this->kategori->allData(),
        ];
        return view('kategori.table', $data);
    }

    public function cari($cari)
    {
        $cari = explode(" " , $cari);
            $data = [
                'kategori' => $this->kategori->cariData($cari),
            ];
        return view('kategori.table', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $test = $this->kategori->jumlahData();
        if ($test <> 0) {
            $cek = $this->kategori->allData();
            foreach ($cek as $ceks) {
               if ($ceks->kategori == $request->kategori) {
                   $a = 2;
                   break;
               } else {
                   $a = 1;
               }
            }
               if ($a == 1) {
                $data = [
                    'kategori' => $request->kategori,
                ];
                $this->kategori->addData($data);
                $data['success'] = 1;
                return response()->json($data);
               }
        } else {
        $a = 1;
        $data = [
            'kategori' => $request->kategori,
        ];
        $this->kategori->addData($data);
        };

        $data = $a;
        return response()->json($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = [
            'kategori' => $this->kategori->detailData($id),
        ];
        return view('kategori.delete', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'kategori' => $this->kategori->detailData($id),
        ];
        return view('kategori.edit', $data);
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
            'kategori' => $request->kategori,
        ];
        $this->kategori->editData($id, $data);
        $data['success'] = 1;
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
        $this->kategori->deleteData($id);
    }
}
