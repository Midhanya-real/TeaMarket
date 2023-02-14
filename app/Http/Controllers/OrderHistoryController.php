<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderHistory;
use App\Repository\OrderHistoryRepository;
use App\Services\PaymentService\PayService;
use App\Services\UpdateModelServices\OrderHistoryService;
use App\Services\UpdateModelServices\OrderService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderHistoryController extends Controller
{
    public function __construct(
        private OrderHistoryRepository $repository,
        private PayService $payService,
        private OrderHistoryService $orderHistoryService,
    ){}

    public function index(): View
    {
        $orders = $this->repository->index();

        return view('history', ['orders' => $orders]);
    }

    public function store(Request $order): RedirectResponse
    {
        $orderLink = $this->payService->create($order);

        $this->orderHistoryService->create($order, $orderLink);

        return redirect($orderLink->confirmation->confirmation_url);
    }

    public function cancel(OrderHistory $order): RedirectResponse
    {
        $orderLink = $this->payService->cancel($order);

        $this->orderHistoryService->update($order, $orderLink);

        return redirect()->route('history.index');
    }
}
