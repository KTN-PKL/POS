<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class toko extends Model
{
    use HasFactory;
    public function Data()
    {
        return DB::table('tokos')->where('id_toko', 1)->first();
    }
    public function detailData($id_toko)
    {
        return DB::table('tokos')->where('id_toko', $id_toko)->first();
    }
    public function editData($id_toko, $data)
    {
        return DB::table('tokos')->where('id_toko', $id_toko)->update($data);
    }
}
