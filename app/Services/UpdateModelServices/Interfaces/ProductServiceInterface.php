<?php

namespace App\Services\UpdateModelServices\Interfaces;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

interface ProductServiceInterface
{
    public function store(StoreProductRequest $request);

    public function update(UpdateProductRequest $request, Product $product);

    public function destroy(Request $request, Product $product);
}
