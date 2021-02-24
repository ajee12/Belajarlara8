<?php

//namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BelajarController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\PersediaanController;
use App\Http\Controllers\BeliController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\PrintController;
use app\Models\PelangganModel;


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
//routepelanggan
Route::get('/', [BelajarController::class, 'index'])->name('/');
Route::get('/belajar/pelanggan', [BelajarController::class, 'pelanggan'])->name('/belajar/pelanggan');
Route::get('/belajar/add', [BelajarController::class, 'add']);
Route::get('/belajar/edit_data', [BelajarController::class, 'edit_data']);
Route::POST('/belajar/save_pelanggan', [BelajarController::class, 'save_pelanggan']);
Route::Post('/belajar/save_edit/{id}', [BelajarController::class, 'save_edit']);
Route::get('/belajar/delete/{id}', [BelajarController::class, 'delete']);

//route pemasok

Route::get('/pemasok/index', [PemasokController::class, 'index'])->name('/pemasok/index');
Route::get('/pemasok/tambah_pemasok', [PemasokController::class, 'tambah_pemasok']);
Route::POST('/pemasok/save_pemasok', [PemasokController::class, 'save_pemasok']);
Route::POST('/pemasok/save_edit/{id}', [PemasokController::class, 'save_edit']);
Route::get('/pemasok/delete/{id}', [PemasokController::class, 'delete']);

//route satuan

Route::get('/satuan/index', [SatuanController::class, 'index'])->name('/satuan/index');
Route::post('/satuan/tambah_satuan', [SatuanController::class, 'tambah_satuan']);
Route::post('/satuan/edit_satuan/{id}', [SatuanController::class, 'edit_satuan']);
Route::get('/satuan/delete_satuan/{id}', [SatuanController::class, 'delete_satuan']);

//routepersediaan
Route::get('/persediaan/index', [PersediaanController::class, 'index'])->name('/persediaan/index');
Route::get('/persediaan/tambah_persediaan', [PersediaanController::class, 'tambah_persediaan']);
Route::post('/persediaan/save_persediaan', [PersediaanController::class, 'save_persediaan']);

//rouetebeli
Route::get('/beli/index', [BeliController::class, 'index'])->name('/beli/index');
Route::post('/beli/save_beli', [BeliController::class, 'save_beli']);
Route::get('/beli/e_beli/{id_detail}', [BeliController::class, 'e_beli']);
Route::post('/beli/edit_save/{id_detail}', [BeliController::class, 'edit_save']);
Route::get('/beli/delete/{nobukti}', [BeliController::class, 'delete']);
Route::get('/beli/print/{nobukti}', [BeliController::class, 'print']);

//master
Route::get('/master/index', [MasterController::class, 'index'])->name('/master/index');
Route::get('/master/print/{nobukti}', [MasterController::class, 'print']);
Route::get('/master/e_penjualan/{nobukti}', [MasterController::class, 'e_penjualan'])->name('/master/e_penjualan/{nobukti}');
Route::post('/master/edit_save/{nobukti}', [MasterController::class, 'edit_save']);
Route::get('/master/delete/{id_detail}', [MasterController::class, 'delete']);

//print

Auth::routes();

Route::get('/', [App\Http\Controllers\BelajarController::class, 'index'])->name('/');
