<?php

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
Route::get('/transaksi/create', transactionController::class . '@create')->name('transaksi.create');

Route::post('/transaksi', transactionController::class .'@storeweb')->name('transactions.store');