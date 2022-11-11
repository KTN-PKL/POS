<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;

class c_customer extends Controller
{
    public function __construct()
    {
        $this->customer = new customer();
    }

    public function index()
    {
        return view('customer.index');
    }

    public function read()
    {
        return view('customer.read');
    }

    public function table()
    {
        $data = [
            'customer' => $this->customer->allData(),
        ];
        return view('customer.table', $data);
    }

    public function cari($cari)
    {
        $cari = explode(" " , $cari);
            $data = [
                'customer' => $this->customer->cariData($cari),
            ];
        return view('customer.table', $data);
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $id = $this->customer->id();
        $data = [
            'id_customer' => $id,
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat,
        ];
        $this->customer->addData($data);
        $data['success'] = 1;
        return response()->json($data);
    }

    public function show($id)
    {
        $huruf = "CTM";
        $id_customer = $huruf . sprintf("%03s", $id);
        $data = [
            'customer' => $this->customer->detailData($id_customer),
        ];
        return view('customer.detail', $data);
    }

    public function edit($id)
    {
        $huruf = "CTM";
        $id_customer = $huruf . sprintf("%03s", $id);
        $data = [
            'customer' => $this->customer->detailData($id_customer),
        ];
        return view('customer.edit', $data);
    }
    
    public function update(Request $request, $id)
    {
        $huruf = "CTM";
        $id_customer = $huruf . sprintf("%03s", $id);
        $data = [
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat,
        ];
        $this->customer->editData($id_customer, $data);
        $data['success'] = 1;
        return response()->json($data);
    }

    public function destroy($id)
    {
        $huruf = "CTM";
        $id_customer = $huruf . sprintf("%03s", $id);
        $this->customer->deleteData($id_customer);
    }
}
