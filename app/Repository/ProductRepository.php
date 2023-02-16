<?php

namespace App\Repository;

use App\Filters\Brand;
use App\Filters\Category;
use App\Filters\Country;
use App\Filters\Price;
use App\Filters\Type;
use App\Filters\Weight;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\LazyCollection;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @param Request $request
     * @return LazyCollection
     */
    public function getAll(Request $request): LazyCollection
    {
        return app(Pipeline::class)
            ->send(Product::query())
            ->through([
                Category::class,
                Brand::class,
                Country::class,
                Price::class,
                Type::class,
                Weight::class,
            ])
            ->thenReturn()
            ->lazy();
    }

    /**
     * @param string $name
     * @return LazyCollection
     */
    public function getByName(string $name): LazyCollection // полнотекстовый поиск
    {
        return Product::select('id', 'name', 'weight', 'price')
            ->where('name', $name)->lazy();
    }

    /**
     * @param int $min
     * @param int $max
     * @return LazyCollection
     */
    public function getByPrice(int $min, int $max): LazyCollection
    {
        return Product::select('id', 'name', 'weight', 'price')
            ->whereBetween('price', [$min, $max])->lazy();
    }

    /**
     * @param float $weight
     * @return LazyCollection
     */
    public function getByWeight(float $weight): LazyCollection
    {
        return Product::select('id', 'name', 'weight', 'price')
            ->where('weight', $weight)->lazy();
    }

    /**
     * @param string $brand
     * @return LazyCollection
     */
    public function getByBrand(string $brand): LazyCollection
    {
        return Product::select('id', 'name', 'weight', 'price')
            ->where('brand', $brand)->lazy();
    }

    /**
     * @param string $type
     * @return LazyCollection
     */
    public function getByType(string $type): LazyCollection
    {
        return Product::select('id', 'name', 'weight', 'price')
            ->where('type', $type)->lazy();
    }

    /**
     * @param string $country
     * @return LazyCollection
     */
    public function getByCountry(string $country): LazyCollection
    {
        return Product::select('id', 'name', 'weight', 'price')
            ->where('country', $country)->lazy();
    }
}
