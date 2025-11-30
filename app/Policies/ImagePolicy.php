<?php

namespace App\Policies;

use App\Models\Image;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can update the image.
     */
    public function update(User $user, Image $image): bool
    {
        return $user->id === $image->user_id;
    }

    /**
     * Determine if the given user can delete the image.
     */
    public function delete(User $user, Image $image): bool
    {
        return $user->id === $image->user_id;
    }
}
