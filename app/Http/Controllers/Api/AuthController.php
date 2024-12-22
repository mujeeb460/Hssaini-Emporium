<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $token = $user->createToken('customer_token')->plainTextToken;

            return response()->json([
                'success' => true,
                'data' => $user,
                'token' => $token,
                'message' => 'Login successful',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials',
            ], 401);
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('Customer');

        return response()->json([
            'success' => true,
            'data' => $user,
            'message' => 'User registered successfully',
        ]);
    }
}
