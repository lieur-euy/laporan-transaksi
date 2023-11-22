<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class productController extends Controller


{        
    public function createweb(Request $request){
       
        
        return view('product.create');
    }
    public function storeweb(Request $request)
    {
        $dataproduct = new product();
        $rules = [
            'prdnm' => 'required',
            'harga' => 'required',
        
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validation failed',
                'data' => $validator->errors()
            ],401);
        }
        $dataproduct->prdnm = $request->prdnm;
        $dataproduct->harga = $request->harga;
        $dataproduct->save();
  
        // Jika ingin kembali ke halaman sebelumnya setelah menyimpan
        return redirect()->route('index')
        ->with('success', 'Post created successfully.');
    }


    public function index()
    {
        $dataproduct = new product();
        $data = $dataproduct->all();
        return response()->json([
            'status' => true,
            'message' => 'Successfully registered',
            'data'=> $data
             
         ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataproduct = new product();
        $rules = [
            'prdnm' => 'required',
            'harga' => '',
        
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validation failed',
                'data' => $validator->errors()
            ],401);
        }
        $dataproduct->prdnm = $request->prdnm;
        $dataproduct->harga = $request->harga;
        $dataproduct->save();
        return response()->json([
           'status' => true,
           'message' => 'Successfully registered',
           'data'=> $dataproduct
            
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        return response()->json([
            'status' => true,
            'message' => 'Product details retrieved successfully',
            'data' => $product
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        $product->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Product updated successfully',
            'data' => $product
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        if ($product) {
            $product->delete();
    
            return response()->json([
                'status' => true,
                'message' => 'Product deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Product not found',
            ], 404);
        }
    }
}
