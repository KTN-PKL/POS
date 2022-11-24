<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class akuntansi extends Model
{
    use HasFactory;

    public function allData()
    {
        return DB::table('akuntansis')->get();
    }

    public function exallData($id_akun)
    {
        return DB::table('akuntansis')->whereNot('id_akun', $id_akun)->get();
    }
    public function addData($data)
    {
        DB::table('akuntansis')->insert($data);
    }
    public function detailData($id_akun)
    {
        return DB::table('akuntansis')->where('id_akun', $id_akun)->first();
    }

    public function jumlahData()
    {
        return DB::table('akuntansis')->count('id_akun');
    }

    public function cariData($cari)
    {
        $j = count($cari);
        if ($j == 1) {
            return DB::table('akuntansis')->where('akun', 'like', '%'.$cari[0].'%')->get();
        } else { 
            return DB::table('akuntansis')->where('akun', 'like', '%'.$cari[0].'%')->when($cari, function($queri, $cari) {
                $j = count($cari);
                $j = $j - 1;
                for ($i=0; $i < $j;) { 
                    $i = $i + 1;
                    $queri->orWhere('akun', 'like', '%'.$cari[$i].'%'); 
                }
            })->get();
        }
    }

    public function editData($id_akun, $data)
    {
        return DB::table('akuntansis')->where('id_akun', $id_akun)->update($data);
    }
    public function deleteData($id_akun)
    {
        return DB::table('akuntansis')->where('id_akun', $id_akun)->delete();
    }
}
