<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    /**
     * Метод создания пользователя
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        return response()->json($user);
    }

    /**
     * Метод аутентификации пользователя
     * дополнен созданием токена пользователя  в таблице personal_access_tokens
     */
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (!Auth::attempt($validated)) {
            return response()->json([
                'message' => 'Login or  password is wrong'], 401);
        }
        $user = User::where('email', $validated['email'])->first();
        $user->tokens()->delete();
        $token = $user->createToken($validated['email']);
        return response()->json([
            'user' => $user,
            'token' => $token->plainTextToken,
        ]
        );
    }

    /**
     * Метод дополнен удалением токена пользователя  из таблицы personal_access_tokens
     */
    public function logout()
    {
        $user = Auth::user();
        if ($user->currentAccessToken()->delete()) {
            return response()->json([
                'message' => 'You logOut succesfully'],
                200);
        } else {
            return response()->json([
                'message' => 'You logOut is wrong'],
                404);
        }
    }
}
