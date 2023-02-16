<?php

namespace App\Filters;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class Category implements FiltersInterface
{

    public function handle(Builder $products, Closure $closure)
    {
        return request()->has('categories')
            ? $closure($products)->whereIn('category_id', request('categories'))
            : $closure($products);
    }
}
