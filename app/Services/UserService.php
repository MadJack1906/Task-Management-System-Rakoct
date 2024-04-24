<?php

namespace App\Services;

use App\Models\User;

class UserService
{

    /**
     * Creates a user based on data provided
     *
     * @param array $userInfo
     * @return User
     */
    public function register(array $userInfo): User
    {
        return User::create($userInfo);
    }

    /**
     * Updates the user info
     *
     * @param array $userInfo
     * @param User $user
     * @return User
     */

    public function updateProfile(array $userInfo, User $user): User
    {
        $user->update($userInfo);

        return $user;
    }
}
