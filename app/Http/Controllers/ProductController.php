<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Repository\FilterRepository;
use App\Repository\ProductRepository;
use App\Services\UpdateModelServices\ProductService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        private readonly ProductRepository $productRepository,
        private readonly FilterRepository  $filterRepository,
        private readonly ProductService    $service,
    )
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware(['admin', 'moder'])->except(['index', 'show']);
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
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('products.partials.create-product-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @return RedirectResponse
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $this->service->store($request);

        return redirect()->route('products.index');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|View
     */
    public function edit(Product $product): View|Factory|Application
    {
        return view('products.partials.update-product-form', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $this->service->update(request: $request, product: $product);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Request $request, Product $product): RedirectResponse
    {
        $this->service->destroy(request: $request, product: $product);

        return redirect()->route('products.index');
    }
}
