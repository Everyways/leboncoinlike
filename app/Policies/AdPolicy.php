<?php

namespace App\Policies;

use App\Models\{AppModelsAd as Ad, User};
use Illuminate\Auth\Access\HandlesAuthorization;

class AdPolicy
{
    use HandlesAuthorization;

    /**
     * Grant all abilities to administrator.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function before(User $user)
    {
        if ($user->admin) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ($user->admin) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ad  $ad
     * @return mixed
     */
    public function view(User $user, Ad $ad)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ad  $ad
     * @return mixed
     */
    public function update(User $user, Ad $ad)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ad  $ad
     * @return mixed
     */
    public function delete(User $user, Ad $ad)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ad  $ad
     * @return mixed
     */
    public function restore(User $user, Ad $ad)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ad  $ad
     * @return mixed
     */
    public function forceDelete(User $user, Ad $ad)
    {
        //
    }

    /**
     * Determine whether the user can view the ad.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ad  $ad
     * @return mixed
     */
    public function show(?User $user, Ad $ad)
    {
        if ($user && $user->id == $ad->user_id) {
            return true;
        }
        return $ad->active;
    }

    public function manage(User $user, Ad $ad)
    {
        return $user->id == $ad->user_id;
    }
}
