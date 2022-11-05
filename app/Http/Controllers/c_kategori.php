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

    public function index()
    {
        $data = [
            'kategori' => $this->kategori->allData(),
        ];

        return view('v_kategori', $data);
    }
    public function store(Request $request)
    {
        $data = [
            'kategori' => $requests->kategori,
        ];

        $this->kategori->addData($data);
    }
}
