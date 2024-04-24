<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    public function updateProfile(User $user, User $targetUser): bool
    {
        return $user->id === $targetUser->id;
    }
}
