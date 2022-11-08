<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\c_kategori;
use App\Http\Controllers\c_item;
use App\Http\Controllers\c_login;
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
Route::post('/dashboard', [App\Http\Controllers\c_login::class, 'check'])->name('login.check');
Route::post('/', [App\Http\Controllers\c_login::class, 'logout'])->name('user.logout');



Route::controller(c_kategori::class)->group(function () {
    Route::get('/kategori', 'index')->name('kategori');
    Route::get('/kategori/read', 'read')->name('kategori.read');
    Route::get('/kategori/store', 'store')->name('kategori.store');
    Route::get('/kategori/create', 'create')->name('kategori.create');
    Route::get('/kategori/show/{id}', 'show')->name('kategori.show');
    Route::get('/kategori/update/{id}', 'update')->name('kategori.update');
    Route::get('/kategori/destroy/{id}', 'destroy')->name('kategori.destroy');
});

Route::controller(c_item::class)->group(function () {
    Route::get('/item', 'index')->name('item');
    Route::get('/item/read', 'read')->name('item.read');
    Route::post('/item/store', 'store')->name('item.store');
    Route::get('/item/create', 'create')->name('item.create');
    Route::get('/item/show/{id}', 'show')->name('item.show');
    Route::get('/item/edit/{id}', 'edit')->name('item.edit');
    Route::post('/item/update/{id}', 'update')->name('item.update');
    Route::get('/item/destroy/{id}', 'destroy')->name('item.destroy');
});


Route::get('/test', function () {
    return view('kategori.index');
});

