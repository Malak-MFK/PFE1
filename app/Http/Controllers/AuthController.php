<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {        
        $validatedData = $request->validate([
            'login' => 'string|max:255',
            'nom' => 'required|max:255',
            'prenom' => 'max:255',
            'role' => 'integer',
            'email' => 'required|string|email|max:255|unique:users',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $validatedData['password'] = Hash::make($request->password);
        $user = User::create($validatedData);
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json(['user' => $user, 'token' => $token], 201);
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!Auth::attempt($loginData)) {
            return response()->json(['message' => 'Invalid Credentials'], 401);
        }
        $user = User::where('email', $loginData['email'])->first();
        $token = Auth::user()->createToken('authToken')->plainTextToken;
        return response()->json(['user' => $user, 'token' => $token], 201);
    }
}
