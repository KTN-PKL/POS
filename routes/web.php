<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\c_kategori;
use App\Http\Controllers\c_login;

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
});

Route::get('/test', function () {
    return view('layout.template');
});


