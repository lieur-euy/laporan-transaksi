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

Route::get('/customer/create', customerController::class . '@createweb')->name('customer.create');
Route::post('/customer', customerController::class .'@storeweb')->name('customer.store');

Route::get('/product/create', productController::class . '@createweb')->name('product.create');
Route::post('/product', productController::class .'@storeweb')->name('product.store');