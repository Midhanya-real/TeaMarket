<?php

namespace App\Filters;

use App\Models\Product;
use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\LazyCollection;

class Brand implements FiltersInterface
{
    public function handle(Builder $products, Closure $closure)
    {
        return request()->has('brands')
            ? $closure($products)->whereIn('brand_id', request('brands'))
            : $closure($products);
    }
}
