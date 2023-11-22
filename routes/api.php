<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\laporanTransaksiController;
use App\Http\Controllers\productController;
use App\Http\Controllers\transactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [authController::class, 'register']) ;
Route::post('/login', [authController::class, 'login']) ;

//product
Route::get('/product', [productController::class, 'index']) ;
Route::post('/product', [productController::class, 'store']) ;
Route::put('/product/{product}', [ProductController::class, 'update']);
Route::get('/product/{product}', [ProductController::class, 'show']);
Route::delete('/product/{product}', [productController::class, 'destroy']) ;


//transaction
Route::get('/transaction', [transactionController::class, 'index']) ;
Route::post('/transaction', [transactionController::class, 'store']) ;
Route::put('/transaction/{transaction}', [transactionController::class, 'update']);
Route::get('/transaction/{transaction}', [transactionController::class, 'show']);
Route::delete('/transaction/{transaction}', [transactionController::class, 'destroy']) ;


//customer
Route::get('/customer', [customerController::class, 'index']) ;
Route::post('/customer', [customerController::class, 'store']) ;
Route::put('/customer/{customer}', [customerController::class, 'update']);
Route::get('/customer/{customer}', [customerController::class, 'show']);
Route::delete('/customer/{customer}', [customerController::class, 'destroy']) ;

//laporan 
Route::get('/laporan', [laporanTransaksiController::class, 'index']) ;