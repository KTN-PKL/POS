<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengguna;
use Illuminate\Support\Facades\Hash;

class c_pengguna extends Controller
{
    public function __construct()
    {
        $this->pengguna = new pengguna();  
    }

    public function index()
    {
        return view('pengguna.index');
    }

    public function read()
    {
        return view('pengguna.read');
    }

    public function table()
    {
        $data = [
            'pengguna' => $this->pengguna->allData(),
        ];
        return view('pengguna.table', $data);
    }

    public function cari($cari)
    {
        $cari = explode(" " , $cari);
            $data = [
                'pengguna' => $this->pengguna->cariData($cari),
            ];
        return view('pengguna.table', $data);
    }

    public function create()
    {
        return view('pengguna.create');
    }

    public function store(Request $request)
    {
        $file  = $request->foto;
        $filename = $request->username.'.'.$file->extension();
        $file->move(public_path('fotouser'),$filename);
        $encrypted = Hash::make($request->password);
        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'foto' => $filename,
            'password' => $encrypted,
            'alamatuser' => $request->alamatuser,
            'level' => 1,
            'telepon' => $request->telepon,
        ];
        $this->pengguna->addData($data);
        $data['success'] = 1;
        return response()->json($data);
    }

    public function delete($id)
    {
        $data = [
            'pengguna' => $this->pengguna->detailData($id),
        ];
        return view('pengguna.delete', $data);
    }

    public function edit($id)
    {
        $data = [
            'pengguna' => $this->pengguna->detailData($id),
        ];
        return view('pengguna.edit', $data);
    }

    public function update(Request $request, $id)
    {
        if ($request->foto <> null) {
            $cek = $this->pengguna->detailData($id);
            unlink(public_path('fotouser'). '/' .$cek->foto);
            $file  = $request->foto;
            $filename = $request->username.'.'.$file->extension();
            $file->move(public_path('fotouser'),$filename);
            $data = [
                'name' => $request->name,
                'foto' => $filename,
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

    public function destroy($id)
    {
        $cek = $this->pengguna->detailData($id);
        unlink(public_path('fotouser'). '/' .$cek->foto);
        $this->pengguna->deleteData($id);
    }

    public function tampilProfil()
    {   
        $id = auth()->user()->id;
        $data = [
            'pengguna' => $this->pengguna->detailData($id),
        ];
        return view('profil.index', $data);
    }

    public function editProfil()
    {
        $id = auth()->user()->id;
        $data = [
            'pengguna' => $this->pengguna->detailData($id),
        ];
        return view('profil.edit', $data);
    }
}
