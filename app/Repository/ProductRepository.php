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
}
