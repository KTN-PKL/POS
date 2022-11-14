<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stok;
use App\Models\item;

class c_stok extends Controller
{
    public function __construct()
    {
        $this->item = new item();
        $this->stok = new stok();
    }

    public function index()
    {
        return view('stok.index');
    }

    public function read()
    {
        return view('stok.read');
    }

    public function table()
    {
        $data = [
            'stok' => $this->stok->allData(),
        ];
        return view('stok.table', $data);
    }

}
