<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;
use App\Services\UserVerifyService;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function register(RegisterRequest $request, AuthService $service, UserVerifyService $userVerifyService)
    {
        $data = $request->validated();

        $user = $service->register($data, false);
        $userVerifyService->sendVerifyEmail($user);

        return response()->json('', 200);
    }

    public function login(LoginRequest $request, AuthService $service)
    {
        $data = $request->validated();

        $auth = $service->login($data);

        if($auth) {
            return response()->json($auth, 200);
        }

        return response()->json(['message' => 'Unauthorized.'], 401);
    }

    public function logout(AuthService $service)
    {
        $service->logout();

        return to_route('home');
    }
}
