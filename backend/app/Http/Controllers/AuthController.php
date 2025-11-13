<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;

class   AuthController extends Controller
{
    public static function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (!auth()->attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = $request->user();
        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json(['message' => 'Login successful',  'token' => $token], 200);
    }
}
