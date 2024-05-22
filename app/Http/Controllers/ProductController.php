<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repository\FilterRepository;
use App\Repository\ProductRepository;
use App\Services\UpdateModelServices\ProductService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        private readonly ProductRepository $productRepository,
        private readonly FilterRepository  $filterRepository,
    )
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        $products = $this->productRepository->getAll($request);
        $filters = $this->filterRepository->getAll();

        return view('homePage', [
            'products' => $products,
            'filters' => $filters,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|View
     */
    public function show(Product $product): View|Factory|Application
    {
        return view('product', ['product' => $product]);
    }
}
