<?php

namespace App\Repository;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;

class FilterRepository
{
    private function getBrands(): LazyCollection
    {
        return Brand::lazy();
    }

    private function getTypes(): LazyCollection
    {
        return Type::lazy();

    }

    private function getCategories(): LazyCollection
    {
        return Category::lazy();
    }

    private function getCountries(): LazyCollection
    {
        return Country::lazy();
    }

    private function getWeight()
    {
        return Product::select('weight')->lazy()->unique('weight');
    }

    private function getPrice(): Collection
    {
        $min = Product::min('price');
        $max = Product::max('price');

        return collect(['min' => $min, 'max' => $max]);
    }

    public function getAll(): Collection
    {
        return collect([
            'categories' => $this->getCategories(),
            'brands' => $this->getBrands(),
            'types' => $this->getTypes(),
            'countries' => $this->getCountries(),
            'prices' => $this->getPrice(),
            'weights' => $this->getWeight(),
        ]);
    }
}
