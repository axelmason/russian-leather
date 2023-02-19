<?php

namespace App\Repositories;

use App\Models\UserVerify;

class UserVerifyRepository extends BaseRepository
{
    public $model;

    public function __construct(UserVerify $user)
    {
        $this->model = $user;
    }
}
