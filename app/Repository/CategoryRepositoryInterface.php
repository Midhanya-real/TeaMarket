<?php

namespace App\Repository;

use Illuminate\Http\Request;
use Illuminate\Support\LazyCollection;

interface CategoryRepositoryInterface
{
    public function getAll(Request $request): LazyCollection;
}
