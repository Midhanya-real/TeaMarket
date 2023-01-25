<?php

namespace App\Repository;

use Illuminate\Support\LazyCollection;

interface ProductRepositoryInterface
{
    public function getAll(): LazyCollection;

    public function getByName(string $name): LazyCollection;

    public function getByPrice(int $min, int $max): LazyCollection;

    public function getByWeight(float $weight): LazyCollection;

    public function getByBrand(string $brand): LazyCollection;

    public function getByType(string $type): LazyCollection;

    public function getByFactory(string $factory): LazyCollection;

    public function getByCountry(string $country): LazyCollection;
}
