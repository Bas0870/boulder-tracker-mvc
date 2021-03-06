<?php

namespace App\Policies;

use App\Models\BoulderGym;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BoulderGymPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->admin;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BoulderGym  $boulderGym
     * @return mixed
     */
    public function update(User $user, BoulderGym $boulderGym)
    {
        return $user->admin;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BoulderGym  $boulderGym
     * @return mixed
     */
    public function delete(User $user, BoulderGym $boulderGym)
    {
        return $user->admin;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BoulderGym  $boulderGym
     * @return mixed
     */
    public function restore(User $user, BoulderGym $boulderGym)
    {
        return $user->admin;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BoulderGym  $boulderGym
     * @return mixed
     */
    public function forceDelete(User $user, BoulderGym $boulderGym)
    {
        return $user->admin;
    }
}
