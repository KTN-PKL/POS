<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class transaksi extends Model
{
    use HasFactory;

    public function id()
    {
        $data = DB::table('items')->orderBy('id_item', 'DESC')->first();
        if ($data == null) {
            $urutan = 0;
        } else {
            $kode = $data->id_item;
            $urutan = (int) substr($kode, 3, 3);
        }
        $urutan++;
        $huruf = "ITM";
        $id_item = $huruf . sprintf("%03s", $urutan);
        return $id_item;
    }

    public function id2()
    {
        $cek = DB::table('transaksis')->count();
        if ($cek == 0) {
            DB::table('transaksis')->insert([
        }
    }

    // public function jumlah()
    // {
    //     return 
    // }
}
