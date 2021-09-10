<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SessionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function login(SessionRequest $request)
    {
        $credentials = [
            'email'     => $request->email,
            'password'  => $request->password,
        ];

        if (!Auth::attempt($credentials)) {


            $errors = 'E-mail e/ou password inválidos';

            return response()->json(['errors' => (object) [
                'email' => [$errors],
                'password' => [$errors],
            ]], 401);
        }

        $user = $request->user();

        $token = $user->createToken('123456')->plainTextToken;

        return response()->json(['user' => $user, 'token' => $token]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out']);
    }

    public function unauthenticated()
    {
        return response()->json(['message' => 'token is missing'], 401);
    }
}
