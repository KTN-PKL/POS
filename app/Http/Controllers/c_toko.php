<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\toko;
use DB;

class c_toko extends Controller
{
    public function __construct()
    {
        $this->toko = new toko();  
    }

    public function tampilToko()
    {   
        $id = 1;
        $data = [
            'toko' => $this->toko->detailData($id),
        ];
        return view('toko.index', $data);
    }

    public function editToko()
    {
        $id = 1;
        $data = [
            'toko' => $this->toko->detailData($id),
        ];
        return view('toko.edit', $data);
    }

    public function update(Request $request, $id)
    {
        if ($request->foto <> null) {
            $cek = $this->toko->detailData($id);
            unlink(public_path('fototoko'). '/' .$cek->foto);
            $file  = $request->foto;
            $filename = $request->username.'.'.$file->extension();
            $file->move(public_path('fototoko'),$filename);
            $data = [
                'tnama' => $request->tnama,
                'tnama' => $request->tnama,
                'tfoto' => $filename,
                'alamatuser' => $request->alamatuser,
                'telepon' => $request->telepon,
            ];
        } else {
            $data = [
                'name' => $request->name,
                'alamatuser' => $request->alamatuser,
                'telepon' => $request->telepon,
            ];
        }
        $this->pengguna->editData($id, $data);
        $data = [
            'name' => $request->name,
            'success' => 1,
        ];
        return response()->json($data);
       
        
    }
}
