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
            return view('v_dashboard');
        }
        else
        {
            session()->flash('error', 'Username atau password salah');
            return redirect()->back();
        }
    }

    public function dashboard(){
        return view('v_dashboard');
    }

    public function logout()
    {
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('user.login');
    }
}
