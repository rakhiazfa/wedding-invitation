<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Wedding;
use Illuminate\Auth\Access\Response;

class WeddingPolicy
{
    /**
     * Determine whether the user can do any models.
     */
    public function doAny(User $user, string $username): bool
    {
        return $user->hasRole('customer') && $user->username === $username;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Wedding $wedding): bool
    {
        return $user->customer->id === $wedding->owner_id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Wedding $wedding): bool
    {
        return $user->customer->id === $wedding->owner_id;
    }
}
