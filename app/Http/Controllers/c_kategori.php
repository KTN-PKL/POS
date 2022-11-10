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
                'item' => $this->item->cariData($cari),
            ];
        return view('item.table', $data);
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
        $cek = $this->kategori->allData();
        if ($cek <> null) {
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
    public function show($id)
    {
        $data = [
            'kategori' => $this->kategori->detailData($id),
        ];
        return view('kategori.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
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
