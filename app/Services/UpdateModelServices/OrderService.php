<?php

namespace App\Services\UpdateModelServices;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Resources\OrderResources\OrderStatuses;
use App\Services\UpdateModelServices\Interfaces\OrderServiceInterface;

class OrderService implements OrderServiceInterface
{

    public function store(StoreOrderRequest $request)
    {
        return Order::create([
            'status' => OrderStatuses::NoPaid,
            'count' => $request->count,
            'created_at' => now()->format('d-m-Y H:i:s'),
            'updated_at' => now()->format('d-m-Y H:i:s'),
            'user_id' => $request->user()->id,
            'product_id' => $request->id,
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
