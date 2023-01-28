<?php

namespace App\Repository;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\LazyCollection;

interface OrderRepositoryInterface
{
    public function getAll(Request $request): LazyCollection;

    public function getActive(Request $request): LazyCollection;

    public function getById(Request $request, Order $order): Order|array;
}
