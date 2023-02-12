<?php

namespace App\Http\Controllers;

use App\Services\UserVerifyService;
use Illuminate\Http\Request;

class UserVerifyController extends Controller
{
    public function verifyEmail(UserVerifyService $service, $token)
    {
        $message = $service->verifyUser($token);

        return to_route('home')->with('message', $message);
    }
}
