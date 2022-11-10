<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class kategori extends Model
{
    use HasFactory;

    public function allData()
    {
        return DB::table('kategoris')->get();
    }
    public function addData($data)
    {
        DB::table('kategoris')->insert($data);
    }
    public function detailData($id_kategori)
    {
        return DB::table('kategoris')->where('id_kategori', $id_kategori)->first();
    }

    public function cariData($cari)
    {
        $j = count($cari);
        if ($j == 1) {
            return DB::table('items')->join('kategoris', 'items.id_kategori', '=', 'kategoris.id_kategori')->where('item', 'like', '%'.$cari[0].'%')->get();
        } else { 
            return DB::table('items')->join('kategoris', 'items.id_kategori', '=', 'kategoris.id_kategori')->where('item', 'like', '%'.$cari[0].'%')->when($cari, function($queri, $cari) {
                $j = count($cari);
                $j = $j - 1;
                for ($i=0; $i < $j;) { 
                    $i = $i + 1;
                    $queri->orWhere('item', 'like', '%'.$cari[$i].'%'); 
                }
            })->get();
        }
    }

    public function editData($id_kategori, $data)
    {
        return DB::table('kategoris')->where('id_kategori', $id_kategori)->update($data);
    }
    public function deleteData($id_kategori)
    {
        return DB::table('kategoris')->where('id_kategori', $id_kategori)->delete();
    }
}
