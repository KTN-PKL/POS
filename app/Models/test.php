<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class test extends Model
{
    use HasFactory;
    public function detailData($id_test)
    {
        return DB::table('tests')->where('id_test', $id_test)->first();
    }
    public function editData($id_test, $data)
    {
        return DB::table('tests')->where('id_test', $id_test)->update($data);
    }
}
