<?php

namespace App\Repository;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\LazyCollection;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAll(Request $request): LazyCollection
    {
        return $request->user()->can('viewAny', Category::class)
            ? Category::lazy()
            : [];
    }
}
