<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Repository\OrderRepository;
use App\Services\UpdateModelServices\OrderService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class OrderController extends Controller
{

    public function __construct(
        private OrderService $service,
        private OrderRepository $repository,
    )
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $orders = $this->repository->getAll($request);

        return view('orders.orders', ['orders' => $orders]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOrderRequest $request
     * @return RedirectResponse
     */
    public function store(StoreOrderRequest $request): RedirectResponse
    {
        $this->service->store($request);

        return redirect()->route('orders.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Order $order
     * @return Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateOrderRequest $request
     * @param Order $order
     * @return Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $this->service->update($request, $order);

        return response('ok',200); //TODO исправить
    }
}
