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
            'type' => $request->type,
            'weight' => $request->weight,
            'price' => $request->price,
            'brand' => $request->brand,
            'country' => $request->country,
            'category_id' => $request->category_id
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        return $product->update([
            'name' => $request->name,
            'type' => $request->type,
            'weight' => $request->weight,
            'price' => $request->price,
            'brand' => $request->brand,
            'country' => $request->country,
            'category_id' => $request->category_id
        ]);
    }

    public function destroy(Request $request, Product $product)
    {
        return $request->user()->can('delete', $product)
            ? $product->delete()
            : false;
    }
}
