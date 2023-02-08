<?php

namespace App\Filters;

use App\Models\Product;
use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\LazyCollection;

class Country implements FiltersInterface
{

    public function handle(Builder $products, Closure $closure)
    {
        return request()->has('countries')
            ? $closure($products)->whereIn('country_id', request('countries'))
            : $closure($products);
    }
}
