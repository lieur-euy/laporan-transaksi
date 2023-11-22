<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class authController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Store a newly created resource in storage.
     */    public function register(Request $request)
    {
        $dataUser = new User();
        
        $rules = [
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validation failed',
                'data' => $validator->errors()
            ],401);
        }
        $dataUser->name = $request->username;
        $dataUser->email = $request->email;
        $dataUser->password = Hash::make($request->password);
        $dataUser->save();
        return response()->json([
            'status' => true,
            'message' => 'Successfully registered',
            
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Login failed',
                'data' => $validator->errors()
            ],401);
        }

        if(!Auth::attempt($request->only(['email', 'password']))){
            return response()->json([
              'status' => false,
              'message' => 'Login failed',
            ],401);
        }

        $datauser = User::where('email', $request->email)->first();
        return response()->json([
          'status' => true,
          'message' => 'Login successfully',
           'token' => $datauser->createToken('api-token')->plainTextToken,
        ],200);
    }

}
