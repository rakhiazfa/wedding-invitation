<?php

namespace App\Policies;

use App\Models\Invitation;
use App\Models\User;
use App\Models\Wedding;
use Illuminate\Auth\Access\Response;

class InvitationPolicy
{
    /**
     * Determine whether the user can do any models.
     */
    public function doAny(User $user, Wedding|string $wedding): bool
    {
        if (!$wedding instanceof Wedding) {
            $wedding = Wedding::find((int) $wedding);
        }

        return $user->hasRole('customer') && $user->customer->id === $wedding->owner_id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Wedding $wedding, Invitation $invitation): bool
    {
        return $wedding->id === $invitation->wedding_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Wedding $wedding, Invitation $invitation): bool
    {
        return $wedding->id === $invitation->wedding_id;
    }

    /**
     * Determine if the user can see the qr code.
     */
    public function viewQrCode(?User $user, Wedding $wedding, Invitation $invitation): bool
    {
        return $wedding->id === $invitation->wedding_id;
    }
}
