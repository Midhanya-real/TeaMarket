<?php

namespace App\Policies;

use App\Models\History;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class HistoryPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->isAdmin() || $user->isModer()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user)
    {
        $user->isAdmin() || $user->isModer();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param History $orderHistory
     * @return Response|bool
     */
    public function view(User $user, History $orderHistory)
    {
        return $user->id === $orderHistory->user_id;
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
     * @param History $orderHistory
     * @return Response|bool
     */
    public function update(User $user, History $orderHistory)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param History $orderHistory
     * @return Response|bool
     */
    public function delete(User $user, History $orderHistory)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param History $orderHistory
     * @return Response|bool
     */
    public function restore(User $user, History $orderHistory)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param History $orderHistory
     * @return Response|bool
     */
    public function forceDelete(User $user, History $orderHistory)
    {
        return false;
    }
}
