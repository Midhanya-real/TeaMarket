<?php

namespace App\Services\UpdateModelServices;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Services\UpdateModelServices\Interfaces\OrderServiceInterface;
use Carbon\Carbon;

class OrderService implements OrderServiceInterface
{

    public function store(StoreOrderRequest $request)
    {
        return Order::create([
            'status' => $request->status,
            'count' => $request->count,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'user_id' => $request->user()->id,
            'product_id' => $request->product_id,
        ]);
    }

    public function update(UpdateOrderRequest $request, Order $order): bool
    {
        return $order->update([
            'status' => $request->status,
            'updated_at' => Carbon::now(),
        ]);
    }

    public function destroy(Order $order): bool
    {
        return $order->delete();
    }
}
