<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

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


Route::get('/home', [HomeController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/create', [KategoriController::class, 'add']);
Route::post('simpan_kategori', [KategoriController::class, 'store'])->name('simpankategori');
Route::post('edit_kategori', [KategoriController::class, 'update'])->name('editkategori');
Route::get('/kategori/edit/{id_kategori}', [KategoriController::class, 'edit']);
Route::get('/kategori/hapus/{id_kategori}', [KategoriController::class, 'hapus'])->name('kategori.hapus');

Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::get('/transaksi/add', [TransaksiController::class, 'add']);
Route::post('simpan_transaksi', [TransaksiController::class, 'store'])->name('simpantransaksi');
Route::post('edit_transaksi', [TransaksiController::class, 'update'])->name('edittransaksi');
Route::get('/transaksi/edit/{id_transaksi}', [TransaksiController::class, 'edit']);
Route::get('/transaksi/hapus/{id_kategori}', [TransaksiController::class, 'hapus'])->name('transaksi.hapus');
