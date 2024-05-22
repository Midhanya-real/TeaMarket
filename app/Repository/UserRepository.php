<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\LazyCollection;

class UserRepository
{
    public function getAll(Request $request): LazyCollection
    {
        return $request->user()->can('viewAny', User::class)
            ? User::lazy()
            : [];
    }
}
