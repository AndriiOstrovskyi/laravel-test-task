<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->save();

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        $minutes = 30 * 24 * 60;

        $token->save();

        return response()->json(['message' => __('authorization successful')], 200)
                ->cookie('access_token', $tokenResult->accessToken, $minutes, env('COOKIE_PATH'), env('COOKIE_DOMAIN'), env('COOKIE_SECURE'), false, false, env('COOKIE_SAMESITE')); 
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        $minutes = 30 * 24 * 60;

        $token->save();

        return response()->json(['message' => __('authorization successful')], 200)
                ->cookie('access_token', $tokenResult->accessToken, $minutes, env('COOKIE_PATH'), env('COOKIE_DOMAIN'), env('COOKIE_SECURE'), false, false, env('COOKIE_SAMESITE'));
    }

    public function logout(Request $request)
    {

        Auth::user()->token()->revoke();

        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}
