<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'image' => $request->image,
        ];

        $user = User::create($input);

        return response()->json([
            'status' => "success",
            'message' => "Register success"
        ]);
    }

    public function login(Request $request){
        $input = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $user = User::where('email', $input['email'])->first();

        if (Auth::attempt($input)){
            $token = $user->createToken('token')->plainTextToken;

            return response()->json([
                'code' => 200,
                'status' => 'success',
                'message' => 'Login success',
                'token' => $token,
            ]);
        }else{
            return response()->json([
                'code' => 401,
                'status' => 'error',
                'message' => 'Login failed',
            ]);
        };
    }
}
