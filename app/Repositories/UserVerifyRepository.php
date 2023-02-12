<?php

namespace App\Repositories;

use App\Models\User;

class UserVerifyRepository extends BaseRepository
{
    public $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }
}
