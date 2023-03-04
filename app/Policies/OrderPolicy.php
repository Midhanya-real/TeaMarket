<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class OrderPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if($user->isAdmin() || $user->isModer()){
            return true;
        }
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
     * @param Order $order
     * @return Response|bool
     */
    public function view(User $user, Order $order): Response|bool
    {
        return $order->user_id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user): Response|bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Order $order
     * @return Response|bool
     */
    public function update(User $user, Order $order): Response|bool
    {
        return $order->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Order $order
     * @return Response|bool
     */
    public function delete(User $user, Order $order): Response|bool
    {
        return $user->id === $order->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Order $order
     * @return Response|bool
     */
    public function restore(User $user, Order $order): Response|bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Order $order
     * @return Response|bool
     */
    public function forceDelete(User $user, Order $order): Response|bool
    {
        return false;
    }
}
