<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\c_kategori;
use App\Http\Controllers\c_item;
use App\Http\Controllers\c_pengguna;
use App\Http\Controllers\c_login;
use App\Http\Controllers\c_customer;
use App\Http\Controllers\CrudController;

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
    Route::get('/kategori/show/{id}', 'show')->name('kategori.show');
    Route::get('/kategori/update/{id}', 'update')->name('kategori.update');
    Route::get('/kategori/destroy/{id}', 'destroy')->name('kategori.destroy');
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
    Route::post('/pengguna/update/{id}', 'update')->name('pengguna.update');
    Route::get('/pengguna/destroy/{id}', 'destroy')->name('pengguna.destroy');
});

Route::get('/test', function () {
    return view('kategori.index');
});

