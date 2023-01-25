<?php

namespace App\Repository;

use App\Models\Character;
use App\Models\Product;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\LazyCollection;

class ProductRepository
{
    public function getAll(): LazyCollection
    {
        return Product::lazy();
    }

    public function getByName(string $name): LazyCollection
    {
        return Product::where('name', $name)->lazy();
    }

    public function getByPrice(int $min, int $max): LazyCollection
    {
        return Product::whereBetween('price', [$min, $max])->lazy();
    }

    public function getByWeight(float $weight): LazyCollection
    {
        return Product::where('weight', $weight)->lazy();
    }

    public function getByBrand(string $brand): LazyCollection
    {
        return Product::whereHas('character', function (Builder $query) use ($brand) {
                $query->where('brand', '=', $brand);
            })
            ->lazy();
    }

    public function getByType(string $type): LazyCollection
    {
        return Product::whereHas('character', function (Builder $query) use ($type) {
                $query->where('type', '=', $type);
            })
            ->lazy();
    }

    public function getByFactory(string $factory): LazyCollection
    {
        return Product::whereHas('character', function (Builder $query) use ($factory) {
                $query->where('factory', '=', $factory);
            })
            ->lazy();
    }

    public function getByCountry(string $country): LazyCollection
    {
        return Product::whereHas('character', function (Builder $query) use ($country) {
                $query->where('country', '=', $country);
            })
            ->lazy();
    }
}
