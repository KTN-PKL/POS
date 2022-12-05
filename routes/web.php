<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\c_kategori;
use App\Http\Controllers\c_item;
use App\Http\Controllers\c_pengguna;
use App\Http\Controllers\c_login;
use App\Http\Controllers\c_stok;
use App\Http\Controllers\c_customer;
use App\Http\Controllers\c_kasir;
use App\Http\Controllers\c_toko;
use App\Http\Controllers\c_akuntansi;
use App\Http\Controllers\c_keuangan;
use App\Http\Controllers\c_order;
use App\Http\Controllers\c_laporan;
use App\Http\Controllers\c_cashflow;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login Logout
Route::get('/', [App\Http\Controllers\c_login::class, 'index']);
Route::get('/dashboard', [App\Http\Controllers\c_login::class, 'dashboard'] );
Route::post('/check', [App\Http\Controllers\c_login::class, 'check'])->name('login.check');
Route::post('/', [App\Http\Controllers\c_login::class, 'logout'])->name('user.logout');



Route::controller(c_kategori::class)->group(function () {
    Route::get('/kategori', 'index')->name('kategori');
    Route::get('/kategori/read', 'read')->name('kategori.read');
    Route::get('/kategori/table', 'table')->name('kategori.table');
    Route::get('/kategori/cari/{cari}', 'cari')->name('kategori.cari');
    Route::get('/kategori/store', 'store')->name('kategori.store');
    Route::get('/kategori/create', 'create')->name('kategori.create');
    Route::get('/kategori/edit/{id}', 'edit')->name('kategori.edit');
    Route::get('/kategori/update/{id}', 'update')->name('kategori.update');
    Route::get('/kategori/delete/{id}', 'delete')->name('kategori.delete');
    Route::get('/kategori/destroy/{id}', 'destroy')->name('kategori.destroy');
});

Route::controller(c_akuntansi::class)->group(function () {
    Route::get('/akuntansi', 'index')->name('akuntansi');
    Route::get('/akuntansi/read', 'read')->name('akuntansi.read');
    Route::get('/akuntansi/table', 'table')->name('akuntansi.table');
    Route::get('/akuntansi/cari/{cari}', 'cari')->name('akuntansi.cari');
    Route::get('/akuntansi/store', 'store')->name('akuntansi.store');
    Route::get('/akuntansi/create', 'create')->name('akuntansi.create');
    Route::get('/akuntansi/edit/{id}', 'edit')->name('akuntansi.edit');
    Route::get('/akuntansi/update/{id}', 'update')->name('akuntansi.update');
    Route::get('/akuntansi/delete/{id}', 'delete')->name('akuntansi.delete');
    Route::get('/akuntansi/destroy/{id}', 'destroy')->name('akuntansi.destroy');
});

Route::controller(c_order::class)->group(function () {
    Route::get('/order1', 'index1')->name('order1');
    Route::get('/order2', 'index2')->name('order2');
    Route::get('/order3', 'index3')->name('order3');
    Route::get('/order4', 'index4')->name('order4');
    Route::get('/order5', 'index5')->name('order5');
    Route::get('/order/read', 'read')->name('order.read');
    Route::get('/order/table/{id}', 'table')->name('order.table');
    Route::get('/order/cari', 'cari')->name('order.cari');
    Route::get('/order/tanggal', 'tanggal')->name('order.tanggal');
    Route::get('/order/store', 'store')->name('order.store');
    Route::get('/order/create', 'create')->name('order.create');
    Route::get('/order/edit/{id}', 'edit')->name('order.edit');
    Route::get('/order/show/{id}', 'show')->name('order.show');
    Route::get('/order/update/{id}', 'update')->name('order.update');
    Route::get('/order/delete/{id}', 'delete')->name('order.delete');
    Route::get('/order/destroy/{id}', 'destroy')->name('order.destroy');
});

Route::controller(c_cashflow::class)->group(function () {
    Route::get('/cashflow', 'index')->name('cashflow');
    Route::get('/cashflow/read', 'read')->name('cashflow.read');
});

Route::controller(c_keuangan::class)->group(function () {
    Route::get('/keuangan', 'index')->name('keuangan');
    Route::get('/keuangan/read', 'read')->name('keuangan.read');
    Route::get('/keuangan/table', 'table')->name('keuangan.table');
    Route::get('/keuangan/cari/{cari}', 'cari')->name('keuangan.cari');
    Route::get('/keuangan/store', 'store')->name('keuangan.store');
    Route::get('/keuangan/create', 'create')->name('keuangan.create');
    Route::get('/keuangan/edit/{id}', 'edit')->name('keuangan.edit');
    Route::get('/keuangan/update/{id}', 'update')->name('keuangan.update');
    Route::get('/keuangan/delete/{id}', 'delete')->name('keuangan.delete');
    Route::get('/keuangan/destroy/{id}', 'destroy')->name('keuangan.destroy');
    Route::get('/keuangan/jenis/{id}', 'jenis')->name('keuangan.jenis');
});

Route::controller(c_item::class)->group(function () {
    Route::get('/item', 'index')->name('item');
    Route::get('/item/read', 'read')->name('item.read');
    Route::get('/item/kategori/{id}', 'kategori')->name('item.kategori');
    Route::get('/item/table', 'table')->name('item.table');
    Route::post('/item/store', 'store')->name('item.store');
    Route::get('/item/cari', 'cari')->name('item.cari');
    Route::get('/item/create', 'create')->name('item.create');
    Route::get('/item/show/{id}', 'show')->name('item.show');
    Route::get('/item/edit/{id}', 'edit')->name('item.edit');
    Route::get('/item/delete/{id}', 'delete')->name('item.delete');
    Route::post('/item/update/{id}', 'update')->name('item.update');
    Route::get('/item/destroy/{id}', 'destroy')->name('item.destroy');
});

Route::controller(c_customer::class)->group(function () {
    Route::get('/customer', 'index')->name('customer');
    Route::get('/customer/read', 'read')->name('customer.read');
    Route::get('/customer/cari/{cari}', 'cari')->name('customer.cari');
    Route::get('/customer/table', 'table')->name('customer.table');
    Route::post('/customer/store', 'store')->name('customer.store');
    Route::get('/customer/create', 'create')->name('customer.create');
    Route::get('/customer/edit/{id}', 'edit')->name('customer.edit');
    Route::get('/customer/show/{id}', 'show')->name('customer.show');
    Route::get('/customer/delete/{id}', 'delete')->name('customer.delete');
    Route::post('/customer/update/{id}', 'update')->name('customer.update');
    Route::get('/customer/destroy/{id}', 'destroy')->name('customer.destroy');
});

Route::controller(c_pengguna::class)->group(function () {
    Route::get('/pengguna', 'index')->name('pengguna');
    Route::get('/pengguna/read', 'read')->name('pengguna.read');
    Route::get('/pengguna/table', 'table')->name('pengguna.table');
    Route::get('/pengguna/cari/{cari}', 'cari')->name('pengguna.cari');
    Route::post('/pengguna/store', 'store')->name('pengguna.store');
    Route::get('/pengguna/create', 'create')->name('pengguna.create');
    Route::get('/pengguna/show/{id}', 'show')->name('pengguna.show');
    Route::get('/pengguna/edit/{id}', 'edit')->name('pengguna.edit');
    Route::get('/pengguna/delete/{id}', 'delete')->name('pengguna.delete');
    Route::post('/pengguna/update/{id}', 'update')->name('pengguna.update');
    Route::get('/pengguna/destroy/{id}', 'destroy')->name('pengguna.destroy');
    // editprofil
    Route::get('/profil', 'tampilProfil')->name('profil');
    Route::get('/profil/edit', 'editProfil')->name('profil.edit');
    Route::post('/profil/update/{id}', 'update')->name('profil.update');

   
});

Route::controller(c_stok::class)->group(function () {
    Route::get('/stok', 'index')->name('stok');
    Route::get('/stok/read', 'read')->name('stok.read');
    Route::get('/stok/table', 'table')->name('stok.table');
    Route::get('/stok/cari/{cari}', 'cari')->name('stok.cari');
    Route::get('/stok/edit/{id}', 'edit')->name('stok.edit');
    Route::get('/stok/tambah/{id}', 'tambah')->name('stok.tambah');
    Route::get('/stok/cari', 'cari')->name('stok.cari');
    Route::get('/stok/kategori/{id}', 'kategori')->name('stok.kategori');
});

Route::controller(c_kasir::class)->group(function () {
     // kasir
     Route::get('/kasir', 'index')->name('kasir');
     Route::get('/kasir/read', 'read')->name('kasir.read');
     Route::get('/kasir/table', 'table')->name('kasir.table');
     Route::get('/kasir/cari', 'cari')->name('kasir.cari');
     Route::get('/kasir/kategori/{id}', 'kategori')->name('kasir.kategori');
     Route::get('/kasir/transaksi', 'transaksi')->name('kasir.transaksi');
     Route::get('/kasir/keranjang/{id}', 'keranjang')->name('kasir.keranjang');
     Route::get('/kasir/hitung', 'hitung')->name('kasir.hitung');
     Route::get('/kasir/tambahbarang', 'tambahbarang')->name('kasir.tambahbarang');
     Route::get('/kasir/ubahqty', 'ubahqty')->name('kasir.ubahqty');
     Route::get('/kasir/total/{id}', 'total')->name('kasir.total');
     Route::get('/kasir/grandtotal', 'grandtotal')->name('kasir.grandtotal');
     Route::get('/kasir/kembalian', 'kembalian')->name('kasir.kembalian');
     Route::get('/kasir/customer', 'customer')->name('kasir.customer');
     Route::get('/kasir/add/{id}', 'add')->name('kasir.add');
     Route::get('/kasir/nota/{id}', 'nota')->name('kasir.nota');
     Route::get('/kasir/simpantransaksi', 'simpan')->name('kasir.simpan');
});

Route::controller(c_toko::class)->group(function () {
    // pengaturan toko
    Route::get('/toko', 'tampilToko')->name('toko');
    Route::get('/toko/edit', 'editToko')->name('toko.edit');
    Route::get('/toko/editpengaturan', 'editPengaturan')->name('pengaturan.edit');
    Route::get('/toko/update/{id}', 'update')->name('toko.update');
    Route::post('/toko/updatepengaturan/{id}', 'updatePengaturan')->name('toko.updatepengaturan');

   
});

Route::controller(c_laporan::class)->group(function () {
    Route::get('/laporan', 'index')->name('laporan');
    Route::get('/laporan/read', 'read')->name('laporan.read');
    Route::get('/laporan/table', 'table')->name('laporan.table');
    Route::get('/laporan/cari/{cari}', 'cari')->name('laporan.cari');
    Route::get('/laporan/carix', 'carix')->name('laporan.carix');
    Route::get('/laporan/store', 'store')->name('laporan.store');
    Route::get('/laporan/search', 'search')->name('laporan.search');
    Route::get('/laporan/edit/{id}', 'edit')->name('laporan.edit');
    Route::get('/laporan/update/{id}', 'update')->name('laporan.update');
    Route::get('/laporan/delete/{id}', 'delete')->name('laporan.delete');
    Route::get('/laporan/destroy/{id}', 'destroy')->name('laporan.destroy');
    Route::get('/laporan/export', 'transaksiExport')->name('laporan.export');
    Route::get('/laporan/exportfilter', 'transaksifilterExport')->name('laporan.filter.export');
});


Route::get('/notifikasi', function () {
    return view('v_notifikasi');
});




