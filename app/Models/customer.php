<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class customer extends Model
{
    use HasFactory;

    public function allData()
    {
        return DB::table('customers')->get();
    }

    public function id()
    {
        $data = DB::table('customers')->orderBy('id_customer', 'DESC')->first();
        if ($data == null) {
            $urutan = 0;
        } else {
            $kode = $data->id_customer;
            $urutan = (int) substr($kode, 3, 3);
        }
        $urutan++;
        $huruf = "CTM";
        $id_customer = $huruf . sprintf("%03s", $urutan);
        return $id_customer;
    }

    public function addData($data)
    {
        DB::table('customers')->insert($data);
    }
    public function detailData($id_customer)
    {
        return DB::table('customers')->where('customers.id_customer', $id_customer)->first();
    }
    public function editData($id_customer, $data)
    {
        return DB::table('customers')->where('id_customer', $id_customer)->update($data);
    }
    public function deleteData($id_customer)
    {
        return DB::table('customers')->where('id_customer', $id_customer)->delete();
    }
}
