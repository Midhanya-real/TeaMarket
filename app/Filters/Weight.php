<?php

namespace App\Filters;

use App\Models\Product;
use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\LazyCollection;

class Weight implements FiltersInterface
{

    public function handle(Builder $products, Closure $closure)
    {
        return request()->has('weights')
            ? $closure($products)->whereIn('weight', request('weights'))
            : $closure($products);
    }
}
