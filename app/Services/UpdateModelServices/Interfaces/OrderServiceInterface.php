<?php

namespace App\Services\UpdateModelServices\Interfaces;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;

interface OrderServiceInterface
{
    public function store(StoreOrderRequest $request);

    public function destroy(Order $order): bool;

}
