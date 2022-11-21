<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
use App\Models\item;
use App\Models\customer;
use App\Models\transaksi;
use Auth;
use DB;

class c_login extends Controller
{

    public function __construct()
    {
        $this->kategori = new kategori();
        $this->customer = new customer();
        $this->item = new item();
        $this->transaksi = new transaksi();
 
    }

    public function index()
    {
        return view('v_login');
    }

    public function check(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],[
            'username.required'=>'Username wajib terisi',
            'password.required'=>'Password wajib terisi',
        ]);
        $user = $request->username;
        $pass = $request->password;

        if(auth()->attempt(array('name'=>$user,'password'=>$pass)))
        {
            return redirect('/dashboard');
        }
        else
        {
            session()->flash('error', 'Username atau password salah');
            return redirect()->back();
        }
    }

    public function dashboard(){

        $data = [
            'kategori' => $this->kategori->jumlahData(),
            'customer' => $this->customer->jumlahData(),
            'customer' => $this->customer->grafikData(),
            
        ];
        return view('v_dashboard', $data);
    }

    public function logout()
    {
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('user.login');
    }
}
