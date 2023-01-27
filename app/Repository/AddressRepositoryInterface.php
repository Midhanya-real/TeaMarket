<?php

namespace App\Repository;

use Illuminate\Support\LazyCollection;

interface AddressRepositoryInterface
{
    public function getAll(): LazyCollection;
}
