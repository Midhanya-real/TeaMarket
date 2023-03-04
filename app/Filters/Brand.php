<?php

namespace App\Filters;

use Closure;
use Illuminate\Database\Eloquent\Builder;
class Brand implements FiltersInterface
{
    public function handle(Builder $products, Closure $closure)
    {
        return request()->has('brands')
            ? $closure($products)->whereIn('brand_id', request('brands'))
            : $closure($products);
    }
}
