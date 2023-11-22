<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\product;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class transactionController extends Controller
{
    public function indexs(): View
    {
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

        //render view with posts
        return view('index', compact('formattedTransactions'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    
        return response()->json([
            'status' => true,
            'message' => 'Successfully retrieved',
            'data' => $formattedTransactions
        ], 200);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'customer_id' => 'required',
            'qty' => 'required',
            'total_count' => 'required',
            'product_id' => 'required',
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'data' => $validator->errors()
            ], 401);
        }
    
        $dataproduct = Product::find($request->product_id);
        $datacustomer = Customer::find($request->customer_id);
    
        $datatransaction = new Transaction();
        $datatransaction->invoice_number = "test";
        $datatransaction->customer_id = $datacustomer->id;
        $datatransaction->qty = $request->qty;
        $datatransaction->total_amount = $request->total_count * $dataproduct->harga;
        $datatransaction->total_count = $request->total_count;
        $datatransaction->product_id = $dataproduct->id;
        $datatransaction->invoice_date = now(); // Menetapkan tanggal saat ini
    
        $datatransaction->save();
    
        return response()->json([
            'status' => true,
            'message' => 'Successfully registered',
            'data' => $datatransaction
        ], 200);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(transaction $transaction)
    {
        return response()->json([
            'status' => true,
            'message' => 'Transaction details retrieved successfully',
            'data' => $transaction
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, transaction $transaction)
    {
        $transaction->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'transaction updated successfully',
            'data' => $transaction
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transaction $transaction)
    {
        if ($transaction) {
            $transaction->delete();
    
            return response()->json([
                'status' => true,
                'message' => 'transaction deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'transaction not found',
            ], 404);
        }
    }
}
