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
        return DB::table('items')->get();
    }
    public function addData($data)
    {
        DB::table('items')->insert($data);
    }
    public function detailData($id_item)
    {
        return DB::table('items')->where('id_item', $id_item)->first();
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
