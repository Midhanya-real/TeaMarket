<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Repository\ProductRepository;
use App\Services\UpdateModelsServices\UpdateProductService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function __construct(
        private readonly ProductRepository $repository,
        private UpdateProductService $service,
    ){}
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $products = $this->repository->getAll();

        return response($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(StoreProductRequest $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @return Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = $this->service->create($request);

        Product::create($product);

        return response('ok',200); //TODO исправить
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function show(Product $product)
    {
        return response($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $newProductData = $this->service->update($request);

        $product->update($newProductData);

        return response('ok',200); //TODO исправить
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
