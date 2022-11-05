<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_login extends Controller
{
    public function index()
    {
        return view('v_login');
    }

    public function check(Request $request)
    {
        $user = $request->username;
        $pass = $request->password;

        if(auth()->attempt(array('name'=>$user,'password'=>$pass)))
        {
            return view('test');
        }
        else
        {
            session()->flash('error', 'Username atau password salah');
            return redirect()->name('azz');
        }
    }
}
