<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;
use App\Models\kategori;
use App\Models\stok;

class c_item extends Controller
{

    public function __construct()
    {
        $this->item = new item();
        $this->kategori = new kategori();
        $this->stok = new stok();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('item.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'kategori' => $this->kategori->allData(),
        ];
        return view('item.create', $data);
    }

    public function read()
    {
        $data = [
            'item' => $this->item->allData(),
        ];
        return view('item.read', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $this->item->id();
        $file  = $request->foto;
        $filename = $id.'.'.$file->extension();
        $file->move(public_path('foto'),$filename);
        $data = [
            'id_item' => $id,
            'item' => $request->item,
            'id_kategori' => $request->id_kategori,
            'beli' => $request->beli,
            'jual' => $request->jual,
            'foto' => $filename,
        ];
        $this->item->addData($data);
        $data = [
            'id_item' => $id,
            'stok' => 0,
            'minim' => $request->minim,
        ];
        $this->stok->addData($data);
        $data['success'] = 1;
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
        $huruf = "ITM";
        $id_item = $huruf . sprintf("%03s", $id);
        $data = [
            'item' => $this->item->detailData($id_item),
            'kategori' => $this->kategori->allData(),
        ];
        return view('item.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
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
        $huruf = "ITM";
        $id_item = $huruf . sprintf("%03s", $id);
        if ($request->foto <> null) {
            $cek = $this->item->detailData($id_item);
            unlink(public_path('foto'). '/' .$cek->foto);
            $file  = $request->foto;
            $filename = $id_item.'.'.$file->extension();
            $file->move(public_path('foto'),$filename);
            $data = [
                'item' => $request->item,
                'id_kategori' => $request->id_kategori,
                'beli' => $request->beli,
                'jual' => $request->jual,
                'foto' => $filename,
            ];
        } else {
            $data = [
                'item' => $request->item,
                'id_kategori' => $request->id_kategori,
                'beli' => $request->beli,
                'jual' => $request->jual,
            ];
        }
        $this->item->editData($id_item, $data);
        $data = [
            'minim' => $request->minim,
        ];
        $this->stok->editminimData($id_item, $data);
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
        $huruf = "ITM";
        $id_item = $huruf . sprintf("%03s", $id);
        $cek = $this->item->detailData($id_item);
        unlink(public_path('foto'). '/' .$cek->foto);
        $this->item->deleteData($id_item);
    }
}
