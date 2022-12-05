<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class keuangan extends Model
{
    use HasFactory;

    public function allData()
    {
        return DB::table('keuangans')->join('akuntansis', 'keuangans.id_akun', '=', 'akuntansis.id_akun')->get();
    }
    public function addData($data)
    {
        DB::table('keuangans')->insert($data);
    }
    public function detailData($id_keuangan)
    {
        return DB::table('keuangans')->join('akuntansis', 'keuangans.id_akun', '=', 'akuntansis.id_akun')->where('id_keuangan', $id_keuangan)->first();
    }

    public function jumlahData()
    {
        return DB::table('keuangans')->count('id_keuangan');
    }

    public function pengeluaran()
    {
        return DB::table('keuangans')->join('akuntansis', 'keuangans.id_akun', '=', 'akuntansis.id_akun')->where('jenis', 'Pengeluaran')->sum('uang');
    }

    public function pemasukan()
    {
        return DB::table('keuangans')->join('akuntansis', 'keuangans.id_akun', '=', 'akuntansis.id_akun')->where('jenis', 'Pemasukan')->sum('uang');
    }

    public function pengeluarancari($cari)
    {
        $j = count($cari);
        $uang = 0;
        for ($i=0; $i < $j; $i++) { 
            $plus = DB::table('keuangans')->join('akuntansis', 'keuangans.id_akun', '=', 'akuntansis.id_akun')->where('akun', 'like', '%'.$cari[$i].'%')->where('jenis', 'Pengeluaran')->sum('uang');
            $uang = $uang + $plus;
        }
        return $uang;
    }

    public function pemasukantngl($data)
    {
        return DB::table('keuangans')->join('akuntansis', 'keuangans.id_akun', '=', 'akuntansis.id_akun')->where('jenis', 'Pemasukan')->where('waktu', 'like', $data.'%')->sum('uang');
    }
    public function pengeluarantngl($data)
    {
        return DB::table('keuangans')->join('akuntansis', 'keuangans.id_akun', '=', 'akuntansis.id_akun')->where('jenis', 'pengeluaran')->where('waktu', 'like', $data.'%')->sum('uang');
    }

    public function pemasukancari($cari)
    {
        $j = count($cari);
        $uang = 0;
        for ($i=0; $i < $j; $i++) { 
            $plus = DB::table('keuangans')->join('akuntansis', 'keuangans.id_akun', '=', 'akuntansis.id_akun')->where('akun', 'like', '%'.$cari[$i].'%')->where('jenis', 'Pemasukan')->sum('uang');
            $uang = $uang + $plus;
        }
        return $uang;
    }

    public function cariData($cari)
    {
        $j = count($cari);
        if ($j == 1) {
            return DB::table('keuangans')->join('akuntansis', 'keuangans.id_akun', '=', 'akuntansis.id_akun')->where('akun', 'like', '%'.$cari[0].'%')->get();
        } else { 
            return DB::table('keuangans')->join('akuntansis', 'keuangans.id_akun', '=', 'akuntansis.id_akun')->where('akun', 'like', '%'.$cari[0].'%')->when($cari, function($queri, $cari) {
                $j = count($cari);
                $j = $j - 1;
                for ($i=0; $i < $j;) { 
                    $i = $i + 1;
                    $queri->orWhere('akun', 'like', '%'.$cari[$i].'%'); 
                }
            })->get();
        }
    }

    public function editData($id_keuangan, $data)
    {
        return DB::table('keuangans')->where('id_keuangan', $id_keuangan)->update($data);
    }
    public function deleteData($id_keuangan)
    {
        return DB::table('keuangans')->where('id_keuangan', $id_keuangan)->delete();
    }

}
