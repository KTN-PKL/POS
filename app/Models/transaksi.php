<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class transaksi extends Model
{
    use HasFactory;

    public function allData()
    {
        return DB::table('transaksis')->leftjoin('customers', 'customers.id_customer', '=', 'transaksis.id_customer')->where('dikirim', 'ya')->get();
    }
    
    public function transaksiDaata($id_transaksi)
    {
        return DB::table('transaksis')->where('id_transaksi', $id_transaksi)->first();
    }
    public function id()
    {
        $data = DB::table('transaksis')->orderBy('id_transaksi', 'DESC')->first();
        if ($data == null) {
            $urutan = 0;
        } else {
            $kode = $data->id_transaksi;
            $urutan = (int) substr($kode, 3, 3);
        }
        $urutan++;
        $huruf = "TRS";
        $id_transaksi = $huruf . sprintf("%03s", $urutan);
        return $id_transaksi;
    }

    public function kasir()
    {
        $cek = DB::table('transaksis')->count();
        if ($cek == 0) {
            DB::table('transaksis')->insert(['id_transaksi' => $this->id()]);
        }
        return DB::table('transaksis')->orderBy('id_transaksi', 'DESC')->first();
    }

    public function genid()
    {
        DB::table('transaksis')->insert(['id_transaksi' => $this->id()]);
    }

    public function updateData($id_transaksi, $data)
    {
        DB::table('transaksis')->where('id_transaksi', $id_transaksi)->update($data);
    }

    public function cariData($cari)
    {
        $j = count($cari);
        if ($j == 1) {
            return DB::table('transaksis')->where('atasnama', 'like', '%'.$cari[0].'%')->get();
        } else { 
            return DB::table('transaksis')->where('atasnama', 'like', '%'.$cari[0].'%')->when($cari, function($queri, $cari) {
                $j = count($cari);
                $j = $j - 1;
                for ($i=0; $i < $j;) { 
                    $i = $i + 1;
                    $queri->orWhere('atasnama', 'like', '%'.$cari[$i].'%'); 
                }
            })->get();
        }
    }
    
}
