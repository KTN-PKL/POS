<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class item extends Model
{
    use HasFactory;

    public function allData()
    {
        return DB::table('items')->join('kategoris', 'items.id_kategori', '=', 'kategoris.id_kategori')->get();
    }

    public function id()
    {
        $data = DB::table('items')->orderBy('id_item', 'DESC')->first();
        if ($data == null) {
            $urutan = 0;
        } else {
            $kode = $data->id_item;
            $urutan = (int) substr($kode, 3, 3);
        }
        $urutan++;
        $huruf = "ITM";
        $id_item = $huruf . sprintf("%03s", $urutan);
        return $id_item;
    }

    public function addData($data)
    {
        DB::table('items')->insert($data);
    }
    public function detailData($id_item)
    {
        return DB::table('items')->join('stoks', 'items.id_item', '=', 'stoks.id_item')->where('items.id_item', $id_item)->first();
    }
    public function editData($id_item, $data)
    {
        return DB::table('items')->where('id_item', $id_item)->update($data);
    }
    public function deleteData($id_item)
    {
        return DB::table('items')->where('id_item', $id_item)->delete();
    }
}
