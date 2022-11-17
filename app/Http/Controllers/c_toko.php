<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\toko;
use App\Models\pengaturan;
use DB;

class c_toko extends Controller
{
    public function __construct()
    {
        $this->toko = new toko();  
        $this->pengaturan = new pengaturan();  
    }

    public function tampilToko()
    {   
        return view('toko.index');
    }

    public function editToko()
    {   
        $id_toko = 1;
        $data = [
            'toko' => $this->toko->detailData($id_toko),
        ];
        return view('toko.edit', $data);
    }

    public function update(Request $request, $id)
    {       
        $id_toko = 1;    
        $data = [
                'tnama' => $request->tnama,
                'talamat' => $request->talamat,
                'thp' => $request->thp,
                'temail' => $request->temail,
                'tpemilik' => $request->tpemilik,
                'twebsite' => $request->twebsite,
            ];
        
        $this->toko->editData($id_toko, $data);
        $data = [
            'success' => 1,
        ];
        return response()->json($data);  
    }

    public function editPengaturan()
    {   
        $id_pengaturan = 1;
        $data = [
            'pengaturan' => $this->pengaturan->detailData($id_pengaturan),
        ];
        return view('toko.editPengaturan', $data);
    }

    public function updatePengaturan(Request $request, $id)
    {       
        $id_pengaturan = 1;    
        $data = [
                'tos' => $request->tos,
            ];
        
        $this->pengaturan->editData($id_pengaturan, $data);
        $data = [
            'success' => 1,
        ];
        // return redirect()->back();  
        return response()->json($data);  
    }


  
}
