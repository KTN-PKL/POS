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
        return DB::table('keranjangs')->join('items', 'keranjangs.id_item', '=', 'items.id_item')->join('kategoris','items.id_kategori','=','kategoris.id_kategori')->where('id_transaksi', $id_transaksi)->get();
    }
    public function addData($data)
    {
        DB::table('keranjangs')->insert($data);
    }
    public function jumlahData($id_transaksi, $id_item)
    {
        return DB::table('keranjangs')->where('id_transaksi', $id_transaksi)->where('id_item', $id_item)->count();
    }
    public function cekData($id_transaksi, $id_item)
    {
        return DB::table('keranjangs')->where('id_transaksi', $id_transaksi)->where('id_item', $id_item)->first();
    }
    public function updateData($id_transaksi, $id_item, $data)
    {
        return DB::table('keranjangs')->where('id_transaksi', $id_transaksi)->where('id_item', $id_item)->update($data);
    }
    public function total($id_transaksi)
    {
        return DB::table('keranjangs')->where('id_transaksi', $id_transaksi)->sum('subtotal');
    }
}
