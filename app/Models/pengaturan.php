<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengaturan extends Model
{
    use HasFactory;
    public function detailData($id_pengaturan)
    {
        return DB::table('pengaturans')->where('id_pengaturan', $id_pengaturan)->first();
    }
    public function editData($id_pengaturan, $data)
    {
        return DB::table('pengaturans')->where('id_pengaturan', $id_pengaturan)->update($data);
    }
}
