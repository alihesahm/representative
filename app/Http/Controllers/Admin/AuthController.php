<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $user = User::query()->where('email', $data['email'])->where('password', $data['password'])->first();
        if (! $user) {
            return sendFailedResponse('Invalid email or password', status_code:401);
        }
        $user->token = $user->createToken('Admin Token')->plainTextToken;
        return sendSuccessResponse('Login successfully', $user);
    }
}
