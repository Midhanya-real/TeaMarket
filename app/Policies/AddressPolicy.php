<?php

namespace App\Policies;

use App\Models\Address;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class AddressPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool
     */
    public function before(User $user)
    {
        return $user->isAdmin() || $user->isModer();
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user): Response|bool
    {
        return $user->isAdmin() || $user->isModer();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Address $address
     * @return Response|bool
     */
    public function view(User $user, Address $address)
    {
        return $user->id == $address->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Address $address
     * @return Response|bool
     */
    public function update(User $user, Address $address)
    {
        return $user->id === $address->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Address $address
     * @return Response|bool
     */
    public function delete(User $user, Address $address)
    {
        return $user->id === $address->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Address $address
     * @return Response|bool
     */
    public function restore(User $user, Address $address)
    {
        return $user->id === $address->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Address $address
     * @return Response|bool
     */
    public function forceDelete(User $user, Address $address)
    {
        return $user->id === $address->user_id;
    }
}
