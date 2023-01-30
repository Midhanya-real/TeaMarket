<?php

namespace App\Services\UpdateModelsServices;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class UpdateProductService
{
    public function create(StoreProductRequest $request): array
    {
        return [
            'name' => $request->name,
            'type' => $request->type,
            'weight' => $request->weight,
            'price' => $request->price,
            'brand' => $request->brand,
            'country' => $request->country,
            'category_id' => $request->category_id
        ];
    }

    public function update(UpdateProductRequest $request): array
    {
        return [
            'name' => $request->name,
            'type' => $request->type,
            'weight' => $request->weight,
            'price' => $request->price,
            'brand' => $request->brand,
            'country' => $request->country,
            'category_id' => $request->category_id
        ];
    }
}
