<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        // validatetion
        $attributes = request()->validate([
            'email' => "required",
            'password' => "required"
        ]);

        // check user is exit or login
        $user = \App\Models\User::where('email', $attributes['email'])->first();

        if(!$user){
            throw ValidationException::withMessages([
                'email' => ['The Provided credentials are incorrect']
            ]);
        }

        if(!Hash::check( $attributes['password'], $user->password)){
            throw ValidationException::withMessages([
                'email' => ['The Provided credentials are incorrect password']
            ]);
        }

        $token = $user->createToken('api-token')->plainTextToken;
        return response()->json([
            "token" => $token
        ]); 
        // create token
    }

    public function logout(Request $request)
    {
        request()->user()->tokens()->delete();

        return response()->json([
            'message' => "Logged out Successfully"
        ]);
    }
}
