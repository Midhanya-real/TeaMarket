<?php

namespace App\Repository;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\LazyCollection;

/**
 *
 */
class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @return LazyCollection
     */
    public function getAll(): LazyCollection
    {
        return Product::select('name', 'weight', 'price')->lazy();
    }

    /**
     * @param string $name
     * @return LazyCollection
     */
    public function getByName(string $name): LazyCollection // полнотекстовый поиск
    {
        return Product::select('name', 'weight', 'price')
            ->where('name', $name)->lazy();
    }

    /**
     * @param int $min
     * @param int $max
     * @return LazyCollection
     */
    public function getByPrice(int $min, int $max): LazyCollection
    {
        return Product::select('name', 'weight', 'price')
            ->whereBetween('price', [$min, $max])->lazy();
    }

    /**
     * @param float $weight
     * @return LazyCollection
     */
    public function getByWeight(float $weight): LazyCollection
    {
        return Product::select('name', 'weight', 'price')
            ->where('weight', $weight)->lazy();
    }

    /**
     * @param string $brand
     * @return LazyCollection
     */
    public function getByBrand(string $brand): LazyCollection
    {
        return Product::select('name', 'weight', 'price')
            ->where('brand', $brand)->lazy();
    }

    /**
     * @param string $type
     * @return LazyCollection
     */
    public function getByType(string $type): LazyCollection
    {
        return Product::select('name', 'weight', 'price')
            ->where('type', $type)->lazy();
    }

    /**
     * @param string $country
     * @return LazyCollection
     */
    public function getByCountry(string $country): LazyCollection
    {
        return Product::select('name', 'weight', 'price')
            ->where('country', $country)->lazy();
    }
}
