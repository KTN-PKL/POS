<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class order extends Model
{
    use HasFactory;

    public function deleteData($id_transaksi)
    {
        DB::table('transaksis')->where('id_transaksi', $id_transaksi)->delete();
    }
    public function detailData($id_transaksi)
    {
        return DB::table('transaksis')->where('id_transaksi', $id_transaksi)->first();
    }
}
