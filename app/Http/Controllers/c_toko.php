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
        $id_toko = 1;
        $data = [
            'toko' => $this->toko->detailData($id_toko),
        ];
        return view('toko.index', $data);
    }

    public function editToko()
    {   
        $id_toko = 1;
        $data = [
            'toko' => $this->toko->detailData($id_toko),
        ];
        return view('toko.edit', $data);
    }

    public function editPengaturan()
    {   
        $id_toko = 1;
        $data = [
            'toko' => $this->toko->detailData($id_toko),
        ];
        return view('toko.edit2', $data);
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

    public function update2(Request $request, $id)
    {
        $id_toko=1;
        // if ($request->tgambar <> null) {
        //     $cek = $this->toko->detailData($id_toko);
        //     unlink(public_path('fototoko'). '/' .$cek->tgambar);
        //     $file  = $request->tgambar;
        //     $filename = $request->id_toko.'.'.$file->extension();
        //     $file->move(public_path('fototoko'),$filename);
        //     $data = [
        //         'tgambar' => $filename,
        //         'tos' => $request->tos,
        //         'tprintukuran' => $request->tprintukuran,
        //         'tprintmodel' => $request->tprintmodel,
        //         'tfooter' => $request->tfooter,
        //         'tdiskonpersen' => $request->tdiskonpersen,
        //         'tpajakpersen' => $request->tpajakpersen,
        //         'tdiskonrp' => $request->tdiskonrp,
        //         'tpajakrp' => $request->tpajakrp,
        //     ];
        // } else {
            $data = [
                'tos' => $request->tos,
                // 'tprintukuran' => $request->tprintukuran,
                // 'tprintmodel' => $request->tprintmodel,
                // 'tfooter' => $request->tfooter,
                // 'tdiskonpersen' => $request->tdiskonpersen,
                // 'tpajakpersen' => $request->tpajakpersen,
                // 'tdiskonrp' => $request->tdiskonrp,
                // 'tpajakrp' => $request->tpajakrp,
            ];
        // }
        $this->toko->editData($id_toko, $data);
        $data = [
            'success' => 1,
        ];
        return response()->json($data);
       
        
    }
}
