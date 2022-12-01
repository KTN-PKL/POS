<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class pengguna extends Model
{
    use HasFactory;

    public function allData()
    {
        return DB::table('users')->whereNot('level', [2])->get();
    }

    public function cariData($cari)
    {
        $j = count($cari);
        if ($j == 1) {
            return DB::table('users')->where('username', 'like', '%'.$cari[0].'%')->get();
        } else { 
            return DB::table('users')->where('username', 'like', '%'.$cari[0].'%')->when($cari, function($queri, $cari) {
                $j = count($cari);
                $j = $j - 1;
                for ($i=0; $i < $j;) { 
                    $i = $i + 1;
                    $queri->orWhere('username', 'like', '%'.$cari[$i].'%'); 
                }
            })->get();
        }
    }

    public function addData($data)
    {
        DB::table('users')->insert($data);
    }
    public function detailData($id)
    {
        return DB::table('users')->where('id', $id)->first();
    }
    public function editData($id, $data)
    {
        return DB::table('users')->where('id', $id)->update($data);
    }
    public function deleteData($id)
    {
        return DB::table('users')->where('id', $id)->delete();
    }
}
