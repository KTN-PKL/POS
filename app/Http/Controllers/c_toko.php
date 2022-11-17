<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\toko;
use App\Models\test;
use DB;

class c_toko extends Controller
{
    public function __construct()
    {
        $this->toko = new toko();  
        $this->test = new test();  
    }

    public function tampilToko()
    {   
        return view('toko.index');
    }

    // public function editToko()
    // {   
    //     $id_toko = 1;
    //     $data = [
    //         'toko' => $this->toko->detailData($id_toko),
    //     ];
    //     return view('toko.edit', $data);
    // }

    // public function update(Request $request, $id)
    // {       
    //     $id_toko = 1;    
    //     $data = [
    //             'tnama' => $request->tnama,
    //             'talamat' => $request->talamat,
    //             'thp' => $request->thp,
    //             'temail' => $request->temail,
    //             'tpemilik' => $request->tpemilik,
    //             'twebsite' => $request->twebsite,
    //         ];
        
    //     $this->toko->editData($id_toko, $data);
    //     $data = [
    //         'success' => 1,
    //     ];
    //     return response()->json($data);  
    // }

    public function editPengaturan()
    {   
        $id_test = 1;
        $data = [
            'test' => $this->test->detailData($id_test),
        ];
        return view('toko.editPengaturan', $data);
    }

    public function updatePengaturan(Request $request, $id)
    {       
        $id_test = 1;    
        $data = [
                'operasi' => $request->operasi,
            ];
        
        $this->test->editData($id_test, $data);
        $data = [
            'success' => 2,
        ];
        return response()->json($data);  
    }


  
}
