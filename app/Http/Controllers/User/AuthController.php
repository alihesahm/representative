<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Broker;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function login(LoginRequest $request):JsonResponse
    {
        $data = $request->validated();
        $user = Broker::query()->where('residency_number', $data['email'])->where('job_number', $data['password'])->first();
        if (! $user) {
            return sendFailedResponse('Invalid email or password', status_code:401);
        }
        $user->token = $user->createToken('User Token')->plainTextToken;
        return sendSuccessResponse('Login successfully', $user);
    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();
        return sendSuccessResponse();
    }
}
