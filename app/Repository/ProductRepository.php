<?php

namespace App\Repository;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\LazyCollection;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll(): LazyCollection
    {
        return Product::select('name', 'weight', 'price')->lazy();
    }

    public function getByName(string $name): LazyCollection // полнотекстовый поиск
    {
        return Product::select('name', 'weight', 'price')
            ->where('name', $name)->lazy();
    }

    public function getByPrice(int $min, int $max): LazyCollection
    {
        return Product::select('name', 'weight', 'price')
            ->whereBetween('price', [$min, $max])->lazy();
    }

    public function getByWeight(float $weight): LazyCollection
    {
        return Product::select('name', 'weight', 'price')
            ->where('weight', $weight)->lazy();
    }

    public function getByBrand(string $brand): LazyCollection
    {
        return Product::select('name', 'weight', 'price')
            ->where('brand', $brand)->lazy();
    }

    public function getByType(string $type): LazyCollection
    {
        return Product::select('name', 'weight', 'price')
            ->where('type', $type)->lazy();
    }

    public function getByCountry(string $country): LazyCollection
    {
        return Product::select('name', 'weight', 'price')
            ->where('country', $country)->lazy();
    }
}
