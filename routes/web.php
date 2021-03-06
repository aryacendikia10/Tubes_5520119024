<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [AdminController::class, 'index'])
    ->name('admin.home')
    ->middleware('is_admin');

Route::resource('merk', 'App\Http\Controllers\MerkController')->middleware('is_admin');
Route::resource('kategori', 'App\Http\Controllers\KategoriController')->middleware('is_admin');
Route::resource('barang', 'App\Http\Controllers\BarangController')->middleware('is_admin');

Route::resource('user/barang', 'App\Http\Controllers\UserController');

