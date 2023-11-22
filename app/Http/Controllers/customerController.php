<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function createweb(Request $request){
       
    
        
        return view('customer.create');
    }
    public function storeweb(Request $request)
    {
        $datacustomer = new customer();
        $rules = [
            'name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validation failed',
                'data' => $validator->errors()
            ],401);
        }
        $datacustomer->name = $request->name;
        $datacustomer->save();
  
        // Jika ingin kembali ke halaman sebelumnya setelah menyimpan
        return redirect()->route('index')
        ->with('success', 'Post created successfully.');
    }
    public function index()
    {
        $datacustomer = new customer();
        $data = $datacustomer->all();
        return response()->json([
            'status' => true,
            'message' => 'Successfully',
            'data'=> $data
             
         ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datacustomer = new customer();
        $rules = [
            'name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validation failed',
                'data' => $validator->errors()
            ],401);
        }
        $datacustomer->name = $request->name;
        $datacustomer->save();
        return response()->json([
           'status' => true,
           'message' => 'Successfully ',
           'data'=> $datacustomer
            
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(customer $customer)
    {
        return response()->json([
            'status' => true,
            'message' => 'Customer details retrieved successfully',
            'data' => $customer
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, customer $customer)
    {
        $customer->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'customer updated successfully',
            'data' => $customer
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(customer $customer)
    {
        if ($customer) {
            $customer->delete();
    
            return response()->json([
                'status' => true,
                'message' => 'customer deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'customer not found',
            ], 404);
        }
    }
}
