<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\authController;
use App\Http\Controllers\kasirController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [authController::class, 'index']);
Route::post('/', [authController::class, 'auth']);
Route::get('/logout', [authController::class, 'logout']);

// Route::get('/admin-user', function () {
//     return view('admin.admin_user');
// });
// Route::get('/kasir-transaksi', function () {
//     return view('kasir.kasir_transaksi');
// });

//ADMIN

Route::get('/admin-user', [adminController::class, 'index_user'])->name('admin.index_user');
Route::get('/admin-produk', [adminController::class, 'index_produk'])->name('admin.index_produk');
Route::get('/admin-transaksi', [adminController::class, 'index_transaksi'])->name('admin.index_transaksi');
Route::get('/admin-detail/{id}', [kasirController::class, 'index_detail'])->name('admin.index_detail');
Route::get('/admin-tambah_user', [adminController::class, 'create_user'])->name('admin.create_user');
Route::get('/admin-tambah_produk', [adminController::class, 'create_produk'])->name('admin.create_produk');
Route::post('/admin-tambah_user', [adminController::class, 'store_user'])->name('admin.store_user');
Route::post('/admin-tambah_produk', [adminController::class, 'store_produk'])->name('admin.store_produk');
Route::get('/admin-edit_user/edit/{id_user}', [adminController::class, 'edit_user'])->name('admin.edit_user');
Route::get('/admin-edit_produk/edit/{id_user}', [adminController::class, 'edit_produk'])->name('admin.edit_produk');
Route::get('/admin-user/{id_user}', [adminController::class, 'destroy_user'])->name('admin.destroy_user');
Route::get('/admin-produk/{id_user}', [adminController::class, 'destroy_produk'])->name('admin.destroy_produk');
Route::put('/admin-edit_user/edit/{id_user}', [adminController::class, 'update_user'])->name('admin.update_user');
Route::put('/admin-edit_produk/edit/{id_produk}', [adminController::class, 'update_produk'])->name('admin.update_produk');


//KASIR

Route::get('/kasir-transaksi', [kasirController::class, 'index_transaksi'])->name('kasir.index_transaksi');
Route::get('/kasir-produk', [kasirController::class, 'index_produk'])->name('kasir.index_produk');
Route::get('/kasir-detail/{id}', [kasirController::class, 'index_detail'])->name('kasir.index_detail');
Route::get('/kasir-create_transaksi', [kasirController::class, 'create_transaksi'])->name('kasir.create_transaksi');
Route::post('/kasir-tambah_transaksi', [kasirController::class, 'store_transaksi'])->name('kasir.store_transaksi');
Route::get('/kasir-transaksi/{id_trans}', [kasirController::class, 'destroy'])->name('kasir.destroy');
