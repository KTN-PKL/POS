<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class stok extends Model
{
    use HasFactory;

    public function allData()
    {
        return DB::table('stoks')->join('items', 'stoks.id_item', '=', 'items.id_item')->join('kategoris', 'items.id_kategori', '=', 'kategoris.id_kategori')->get();
    }
    public function addData($data)
    {
        DB::table('stoks')->insert($data);
    }
    public function detailData($id_stok)
    {
        return DB::table('stoks')->join('items', 'stoks.id_item', '=', 'items.id_item')->where('id_stok', $id_stok)->first();
    }
    public function editData($id_stok, $data)
    {
        return DB::table('stoks')->where('id_stok', $id_stok)->update($data);
    }
    public function editminimData($id_item, $data)
    {
        return DB::table('stoks')->where('id_item', $id_item)->update($data);
    }
    public function deleteData($id_stok)
    {
        return DB::table('stoks')->where('id_stok', $id_stok)->delete();
    }
}
