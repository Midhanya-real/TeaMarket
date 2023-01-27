<?php

namespace App\Repository;

use App\Models\Order;
use Illuminate\Support\LazyCollection;

interface OrderRepositoryInterface
{
    public function getAll(): LazyCollection;

    public function getActive(): LazyCollection;
}
