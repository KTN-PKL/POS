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
        return DB::table('stoks')->get();
    }
    public function addData($data)
    {
        DB::table('stoks')->insert($data);
    }
    public function detailData($id_stok)
    {
        return DB::table('stoks')->where('id_stok', $id_stok)->first();
    }
    public function editData($id_stok, $data)
    {
        return DB::table('stoks')->where('id_stok', $id_stok)->update($data);
    }
    public function deleteData($id_stok)
    {
        return DB::table('stoks')->where('id_stok', $id_stok)->delete();
    }
}
