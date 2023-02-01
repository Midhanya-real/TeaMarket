<?php

namespace App\Services\UpdateModelServices;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Services\UpdateModelServices\Interfaces\OrderServiceInterface;

class OrderService implements OrderServiceInterface
{

    public function store(StoreOrderRequest $request)
    {
        return Order::create([
            'status' => $request->status,
            'count' => $request->count,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
            'user_id' => $request->user()->id,
            'product_id' => $request->product_id,
        ]);
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        return $order->update([
            'status' => $request->status,
            'updated_at' => $request->updated_at,
        ]);
    }
}
