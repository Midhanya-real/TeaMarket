<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Repository\OrderHistoryRepository;
use App\Services\PaymentProcessingService\CancelProcessService;
use App\Services\PaymentProcessingService\CaptureProcessService;
use App\Services\PaymentProcessingService\PayProcessService;
use App\Services\PaymentProcessingService\RefundProcessService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class historyController extends Controller
{
    public function __construct(
        private readonly OrderHistoryRepository $repository,
        private readonly PayProcessService      $payProcessService,
        private readonly CancelProcessService   $cancelProcessService,
        private readonly CaptureProcessService $captureProcessService,
        private readonly RefundProcessService $refundProcessService,
    ){}

    public function index(Request $request): View
    {
        $orders = $this->repository->index($request);

        return view('history', ['orders' => $orders]);
    }

    public function store(Request $order): RedirectResponse
    {
        $orderObject = $this->payProcessService->execute($order);

        return redirect($orderObject->confirmation->confirmation_url);
    }

    public function cancel(History $order): RedirectResponse
    {
        $this->cancelProcessService->execute($order);

        return redirect()->route('history.index');
    }

    public function capture(History $order): RedirectResponse
    {
        $this->captureProcessService->execute($order);

        return redirect()->route('history.index');
    }

    public function refund(History $order): RedirectResponse
    {
        $this->refundProcessService->execute($order);

        return redirect()->route('history.index');
    }
}
