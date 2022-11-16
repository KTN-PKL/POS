<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class keranjang extends Model
{
    use HasFactory;

    public function Data($id_transaksi)
    {
        return DB::table('keranjangs')->join('items', 'keranjangs.id_item', '=', 'items.id_item')->where('id_transaksi', $id_transaksi)->get();
    }
}
