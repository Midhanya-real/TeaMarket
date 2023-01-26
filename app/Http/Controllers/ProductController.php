<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repository\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{

    public function __construct(
        private ProductRepository $repository
    ){}

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $response = $this->repository->getAll();

        return response($response);
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function show(Product $product): Response
    {
        return response($product);
    }
}
