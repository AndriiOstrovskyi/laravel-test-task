<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->save();

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => __('Unauthorized')
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

    public function login(LoginRequest $request)
    {
        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => __('Unauthorized')
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

        return response()->json(['message' => __('Successfully logged out')], 200);
    }
}
