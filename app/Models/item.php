<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class item extends Model
{
    use HasFactory;

    public function allData()
    {
        return DB::table('items')->join('stoks', 'stoks.id_item', '=', 'items.id_item')->join('kategoris', 'items.id_kategori', '=', 'kategoris.id_kategori')->get();
    }

    public function kategoriData($id)
    {
        return DB::table('items')->join('stoks', 'stoks.id_item', '=', 'items.id_item')->join('kategoris', 'items.id_kategori', '=', 'kategoris.id_kategori')->where('items.id_kategori', $id)->get();
    }

    public function cariData($id, $cari)
    {
        $j = count($cari);
        if ($j == 1) {
            return DB::table('items')->join('stoks', 'stoks.id_item', '=', 'items.id_item')->join('kategoris', 'items.id_kategori', '=', 'kategoris.id_kategori')->where('items.id_kategori', $id)->where('item', 'like', '%'.$cari[0].'%')->get();
        } else { 
            return DB::table('items')->join('stoks', 'stoks.id_item', '=', 'items.id_item')->join('kategoris', 'items.id_kategori', '=', 'kategoris.id_kategori')->where('items.id_kategori', $id)->where('item', 'like', '%'.$cari[0].'%')->when($cari, function($queri, $cari) {
                $j = count($cari);
                $j = $j - 1;
                for ($i=0; $i < $j;) { 
                    $i = $i + 1;
                    $queri->orWhere('item', 'like', '%'.$cari[$i].'%'); 
                }
            })->get();
        }
    }

    public function cariData0($cari)
    {
        $j = count($cari);
        if ($j == 1) {
            return DB::table('items')->join('stoks', 'stoks.id_item', '=', 'items.id_item')->join('kategoris', 'items.id_kategori', '=', 'kategoris.id_kategori')->where('item', 'like', '%'.$cari[0].'%')->get();
        } else { 
            return DB::table('items')->join('stoks', 'stoks.id_item', '=', 'items.id_item')->join('kategoris', 'items.id_kategori', '=', 'kategoris.id_kategori')->where('item', 'like', '%'.$cari[0].'%')->when($cari, function($queri, $cari) {
                $j = count($cari);
                $j = $j - 1;
                for ($i=0; $i < $j;) { 
                    $i = $i + 1;
                    $queri->orWhere('item', 'like', '%'.$cari[$i].'%'); 
                }
            })->get();
        }
    }

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

    public function addData($data)
    {
        DB::table('items')->insert($data);
    }
    public function detailData($id_item)
    {
        return DB::table('items')->join('kategoris', 'items.id_kategori', '=', 'kategoris.id_kategori')->join('stoks', 'items.id_item', '=', 'stoks.id_item')->where('items.id_item', $id_item)->first();
    }
    public function editData($id_item, $data)
    {
        return DB::table('items')->where('id_item', $id_item)->update($data);
    }
    public function deleteData($id_item)
    {
        return DB::table('items')->where('id_item', $id_item)->delete();
    }
}
