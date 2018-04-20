<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function update(User $curentUser,User $user)
    {
        return $curentUser->id === $user->id;
    }

    public function destroy(User $curentUser,User $user){
        return $curentUser->is_admin && $curentUser->id !== $user->id;
    }
}
