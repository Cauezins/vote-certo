<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    // Método para login
    // Método para login
    public function login(Request $request)
    {
        // Validação das credenciais
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        try {
            // Tentativa de gerar um token JWT

            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }

        return $this->respondWithToken($token);
    }

    public function show($token)
    {
        try {
            $user = JWTAuth::setToken($token)->authenticate();
            if ($user) {
                return response()->json($user, 200);
            } else {
                return response()->json(['error' => 'Not exists token'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Not exists token'], 400);
        }
    }


    // Método para retornar o token JWT
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => config('jwt.ttl') * 60 // O TTL deve ser retornado em segundos
        ]);
    }

    // Logout
    public function logout()
    {
        // Invalida o token JWT
        JWTAuth::invalidate(JWTAuth::getToken());
        session()->flush(); // Limpa as sessões

        return response()->json(['message' => 'Successfully logged out']);
    }

    // Método para verificar o token
    public function me(Request $request)
    {
        return response()->json($request->user());
    }
}
