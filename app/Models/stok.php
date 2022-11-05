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
        return DB::table('kategoris')->get();
    }
    public function addData($data)
    {
        DB::table('kategoris')->insert($data);
    }
    public function detailData($id_kategori)
    {
        return DB::table('kategoris')->where('id_kategori', $id_kategori)->first();
    }
    public function editData($id_kategori, $data)
    {
        return DB::table('kategoris')->where('id_kategori', $id_kategori)->update($data);
    }
    public function deleteData($id_kategori)
    {
        return DB::table('kategoris')->where('id_kategori', $id_kategori)->delete();
    }
}
