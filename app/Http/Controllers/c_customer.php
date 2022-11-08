<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;

class c_customer extends Controller
{
    public function __construct()
    {
        $this->item = new item();
        $this->kategori = new kategori();
        $this->stok = new stok();
    }

    
}
