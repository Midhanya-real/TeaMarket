<?php

namespace App\Services\UpdateModelServices;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserService
{
    public function update(UpdateUserRequest $request, User $user): bool
    {
        return $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
    }

    public function destroy(Request $request, User $user): bool
    {
        return $request->user()->can('delete', $user)
            ? $user->delete()
            : false;
    }
}
