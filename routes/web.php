<?php

use App\Http\Controllers\customerController;
use App\Http\Controllers\productController;
use App\Http\Controllers\transactionController;
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




Route :: get('/', 'App\Http\Controllers\laporanTransaksiController@indexs')->name('index');

Route::get('/transaksi/create', transactionController::class . '@createweb')->name('transaksi.create');
Route::post('/transaksi', transactionController::class .'@storeweb')->name('transactions.store');
Route::delete('/transaksi/{id}', transactionController::class .'@destroyweb')->name('transactions.destroy');
Route::get('/transaksi/{id}/edit', transactionController::class . '@editweb')->name('transaksi.edit');
Route::put('/transaksi/{id}', transactionController::class . '@updateweb')->name('transactions.update');

Route::get('/customer/create', customerController::class . '@createweb')->name('customer.create');
Route::post('/customer', customerController::class .'@storeweb')->name('customer.store');
Route::delete('/customer/{id}', customerController::class .'@destroyweb')->name('customer.destroy');


Route::get('/product/create', productController::class . '@createweb')->name('product.create');
Route::post('/product', productController::class .'@storeweb')->name('product.store');
Route::delete('/product/{id}', productController::class .'@destroyweb')->name('product.destroy');
