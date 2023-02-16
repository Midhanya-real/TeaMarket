<?php

namespace App\Repository;

use App\Models\Category;
use Illuminate\Support\LazyCollection;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAll(): LazyCollection
    {
        return Category::lazy();
    }
}
