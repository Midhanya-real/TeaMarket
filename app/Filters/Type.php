<?php

namespace App\Filters;

use App\Models\Product;
use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\LazyCollection;

class Type implements FiltersInterface
{

    public function handle(Builder $products, Closure $closure)
    {
        return request()->has('types')
            ? $closure($products)->whereIn('type_id', request('types'))
            : $closure($products);
    }
}
