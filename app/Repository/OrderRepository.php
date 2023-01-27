<?php

namespace App\Repository;

use App\Models\Order;
use Illuminate\Support\LazyCollection;

class OrderRepository implements OrderRepositoryInterface
{
    public function getAll(): LazyCollection
    {
        return Order::select('status', 'created_at', 'updated_at')->lazy();
    }

    public function getActive(): LazyCollection
    {
        return Order::select('status', 'created_at', 'updated_at')
            ->whereIn('status', ['getting', 'transit'])
            ->lazy();
    }
}

