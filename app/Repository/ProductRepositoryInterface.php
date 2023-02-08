<?php

namespace App\Repository;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\LazyCollection;

interface ProductRepositoryInterface
{
    public function getAll(Request $request): LazyCollection;

    public function getByName(string $name): LazyCollection;

    public function getByPrice(int $min, int $max): LazyCollection;

    public function getByWeight(float $weight): LazyCollection;

    public function getByBrand(string $brand): LazyCollection;

    public function getByType(string $type): LazyCollection;

    public function getByCountry(string $country): LazyCollection;
}
