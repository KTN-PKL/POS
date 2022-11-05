<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_login extends Controller
{
    public function index(){
        return view('v_login');
    }
}
