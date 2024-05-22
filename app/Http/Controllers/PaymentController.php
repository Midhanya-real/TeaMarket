<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Services\PaymentProcessingService\CreateOrderProcessService;
use App\Services\PaymentProcessingService\RefundOrderProcessService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct(
        private readonly CreateOrderProcessService $payProcessService,
        private readonly RefundOrderProcessService $refundProcessService,
    )
    {
    }

    public function store(Request $order): RedirectResponse
    {
        $orderObject = $this->payProcessService->execute($order);

        return redirect($orderObject->confirmation->confirmation_url);
    }

    public function refund(Payment $order): RedirectResponse
    {
        $this->refundProcessService->execute($order);

        return redirect()->route('payments.index');
    }
}
