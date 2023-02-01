<?php

namespace App\Repository;

use Illuminate\Support\LazyCollection;

interface CategoryRepositoryInterface
{
    public function getAll(): LazyCollection;
}
