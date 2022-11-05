<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\c_kategori;

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

Route::get('/', [App\Http\Controllers\c_login::class, 'index'])->name('az');
Route::post('/check', [App\Http\Controllers\c_login::class, 'check'])->name('login.check');

Route::controller(c_kategori::class)->group(function () {
    Route::get('/kategori', 'index')->name('kategori');
});

Route::get('/test', function () {
    return view('layout.template');
});


