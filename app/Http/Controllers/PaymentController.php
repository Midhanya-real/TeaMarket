<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Repository\PaymentRepository;
use App\Services\PaymentProcessingService\CancelOrderProcessService;
use App\Services\PaymentProcessingService\CaptureOrderProcessService;
use App\Services\PaymentProcessingService\CreateOrderProcessService;
use App\Services\PaymentProcessingService\RefundOrderProcessService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use YooKassa\Request\Payments\CreatePaymentResponse;

class PaymentController extends Controller
{
    public function __construct(
        private readonly PaymentRepository          $paymentRepository,
        private readonly CreateOrderProcessService  $payProcessService,
        private readonly CancelOrderProcessService  $cancelProcessService,
        private readonly CaptureOrderProcessService $captureProcessService,
        private readonly RefundOrderProcessService  $refundProcessService,
    ){}

    public function index(Request $request): View|RedirectResponse
    {
        $payments = $this->paymentRepository->getAll($request);

        return view('payments', ['orders' => $payments]);
    }

    public function store(Request $order): RedirectResponse
    {
        $orderObject = $this->payProcessService->execute($order);

        return redirect($orderObject->confirmation->confirmation_url);
    }

    public function cancel(Payment $order): RedirectResponse
    {
        $this->cancelProcessService->execute($order);

        return redirect()->route('payments.index'); //TODO переделать под Payment
    }

    public function capture(Payment $order): RedirectResponse
    {
        $this->captureProcessService->execute($order);

        return redirect()->route('payments.index'); //TODO переделать под Payment
    }

    public function refund(Payment $order): RedirectResponse
    {
        $this->refundProcessService->execute($order);

        return redirect()->route('payments.index'); //TODO переделать под Payment
    }
}
