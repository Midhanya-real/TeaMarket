<?php

namespace App\Services\UpdateModelsServices;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class UpdateOrderService
{
    public function create(StoreOrderRequest $request): array
    {
        return [
            'status' => $request->status,
            'count' => $request->count,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
            'user_id' => $request->user()->id,
            'product_id' => $request->product_id,
        ];
    }

    public function update(UpdateOrderRequest $request): array
    {
        return [
            'status' => $request->status,
            'updated_at' => $request->updated_at,
        ];
    }
}
