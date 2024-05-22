<?php

namespace App\Services\UpdateModelServices;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Services\UpdateModelServices\Interfaces\ProductServiceInterface;
use Illuminate\Http\Request;

class ProductService implements ProductServiceInterface
{

    public function store(StoreProductRequest $request)
    {
        return Product::create([
            'name' => $request->name,
            'weight' => $request->weight,
            'price' => $request->price,
            'type_id' => $request->type_id,
            'brand_id' => $request->brand_id,
            'country_id' => $request->country_id,
            'category_id' => $request->category_id
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product): bool
    {
        return $product->update([
            'name' => $request->name,
            'weight' => $request->weight,
            'price' => $request->price,
            'type_id' => $request->type_id,
            'brand_id' => $request->brand_id,
            'country_id' => $request->country_id,
            'category_id' => $request->category_id,
        ]);
    }

    public function destroy(Request $request, Product $product): bool
    {
        return $request->user()->can('delete', $product)
            ? $product->delete()
            : false;
    }
}
