<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\product;
use App\Models\transaction;
use Illuminate\View\View;
class laporanTransaksiController extends Controller
{

    public function indexs():View
    {
        $dataproductnya = new product();
        $dataproducts = $dataproductnya->all();
        $datacustomer = customer::all();
             //get posts
        $transactions = Transaction::all();

        $formattedTransactions = $transactions->map(function ($transaction) {
            $dataproduct = Product::find($transaction->product_id);
            $datacustomer = Customer::find($transaction->customer_id);

            return [
                'id' => $transaction->id,
                'invoice_number' => $transaction->invoice_number,
                'customer_name' => $datacustomer ? $datacustomer->name : null, // Contoh, ganti dengan atribut yang sesuai
                'qty' => $transaction->qty,
                'total_amount' => $transaction->total_amount,
                'product_detail' => $dataproduct ? $dataproduct->prdnm : null, // Contoh, ganti dengan atribut yang sesuai
                'invoice_date' => $transaction->invoice_date

                // Tambahkan lebih banyak bidang jika diperlukan
            ];
        });
        $formattedLaporanTransactions = $transactions->map(function ($transaction) {
            $dataproduct = Product::find($transaction->product_id);
            $datacustomer = Customer::find($transaction->customer_id);
    
            return [
                'id' => $transaction->id,
                'invoice_number' => $transaction->invoice_number,
                'invoice_date' => $transaction->invoice_date,
                'customer_name' => $datacustomer ? $datacustomer->name : null,
                'product_detail' => $dataproduct ? $dataproduct->prdnm : null,// Contoh, ganti dengan atribut yang sesuai
                'qty' => $transaction->qty,
                'total_amount' => $transaction->total_amount,

                // Tambahkan lebih banyak bidang jika diperlukan
            ];
        });
   
        return view('index', compact('dataproducts','formattedTransactions','formattedLaporanTransactions', 'datacustomer'));
    }


    public function index()
    {
        $transactions = Transaction::all();

        $formattedLaporanTransactions = $transactions->map(function ($transaction) {
            $dataproduct = Product::find($transaction->product_id);
            $datacustomer = Customer::find($transaction->customer_id);
    
            return [
                'id' => $transaction->id,
                'invoice_number' => $transaction->invoice_number,
                'invoice_date' => $transaction->invoice_date,
                'customer_name' => $datacustomer ? $datacustomer->name : null,
                'product_detail' => $dataproduct ? $dataproduct->prdnm : null,// Contoh, ganti dengan atribut yang sesuai
                'qty' => $transaction->qty,
                'total_amount' => $transaction->total_amount,

                // Tambahkan lebih banyak bidang jika diperlukan
            ];
        });
    
        return response()->json([
            'status' => true,
            'message' => 'Successfully retrieved',
            'data' => $formattedLaporanTransactions
        ], 200);
    }

}
