<?php

namespace App\Filters;

use App\Models\Product;
use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\LazyCollection;

class Price implements FiltersInterface
{

    public function handle(Builder $products, Closure $closure)
    {
        return request()->has('prices')
            ? $closure($products)->whereBetween('price', request('prices'))
            : $closure($products);
    }
}
