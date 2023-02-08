<?php

namespace App\Filters;

use Closure;
use Illuminate\Database\Eloquent\Builder;

interface FiltersInterface
{
    public function handle(Builder $products, Closure $closure);
}
