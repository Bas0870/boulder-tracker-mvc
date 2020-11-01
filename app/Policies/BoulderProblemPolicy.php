<?php

namespace App\Policies;

use App\Models\BoulderProblem;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Access\HandlesAuthorization;

class BoulderProblemPolicy
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
        if ($user->admin) {
            return true;
        }

        $requiredDaysSinceRegistration = 3;
        $requiredDateToAddGyms = Carbon::now()->subDays($requiredDaysSinceRegistration);

        return $user->created_at->lessThanOrEqualTo($requiredDateToAddGyms);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BoulderProblem  $boulderProblem
     * @return mixed
     */
    public function update(User $user, BoulderProblem $boulderProblem)
    {
        return $boulderProblem->creator === $user || $user->admin;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BoulderProblem  $boulderProblem
     * @return mixed
     */
    public function delete(User $user, BoulderProblem $boulderProblem)
    {
        return $boulderProblem->creator === $user || $user->admin;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BoulderProblem  $boulderProblem
     * @return mixed
     */
    public function restore(User $user, BoulderProblem $boulderProblem)
    {
        return $boulderProblem->creator === $user || $user->admin;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BoulderProblem  $boulderProblem
     * @return mixed
     */
    public function forceDelete(User $user, BoulderProblem $boulderProblem)
    {
        return $boulderProblem->creator === $user || $user->admin;
    }
}
