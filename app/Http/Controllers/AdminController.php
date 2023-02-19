<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginPage()
    {
        return view('admin.login');
    }

    public function login(LoginRequest $request, AuthService $service)
    {
        $data = $request->validated();

        $auth = $service->loginIfAdmin($data);

        if($auth) {
            return to_route('admin.dashboard');
        }
        return back()->withErrors(['message' => 'Не удалось войти как администратор']);
    }
}
