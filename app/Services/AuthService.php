<?php

namespace App\Services;

use App\Models\Role;
use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Auth;

class AuthService extends BaseService
{
    private $repository;

    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;
    }

    public function register(array $data, bool $makeAuth = true)
    {
        if (isset($data['is_entity'])) {
            $data['role_id'] = $this->repository->where('slug', Role::ENTITY)->first()->id;
        }

        $create = $this->repository->create($data);

        if ($create && $makeAuth) {
            $this->login(['email' => $data['email'], 'password' => $data['password']]);
        }

        return $create;
    }

    public function login(array $credentials)
    {
        return Auth::guard('web')->attempt(['email' => $credentials['email'], 'password' => $credentials['password']]);
    }

    public function logout()
    {
        Auth::logout();
    }

    public function loginIfAdmin(array $data) : bool
    {
        $user = $this->repository->where('email', $data['email'])->first();

        if($user->role->slug != Role::ADMIN) {
            return Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);
        }
        return false;
    }
}
