<?php

namespace App\Repository;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\LazyCollection;

interface ProductRepositoryInterface
{
    public function getAll(Request $request): LazyCollection;
}
