<?php

namespace App\Services;

use App\Models\User;

class UserService
{

    /**
     * Creates the user info
     *
     * @param array $userInfo
     * @return User
     */
    public function register(array $userInfo): User
    {
        return User::create($userInfo);
    }
}
