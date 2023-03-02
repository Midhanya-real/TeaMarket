<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Repository\PaymentRepository;
use App\Services\PaymentProcessingService\CancelProcessService;
use App\Services\PaymentProcessingService\CaptureProcessService;
use App\Services\PaymentProcessingService\PayProcessService;
use App\Services\PaymentProcessingService\RefundProcessService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct(
        private readonly PaymentRepository     $paymentRepository,
        private readonly PayProcessService     $payProcessService,
        private readonly CancelProcessService  $cancelProcessService,
        private readonly CaptureProcessService $captureProcessService,
        private readonly RefundProcessService  $refundProcessService,
    ){}

    public function index(Request $request)
    {
        $payments = $this->paymentRepository->getAll($request);

        //TODO view сделай
    }

    public function store(Request $order): RedirectResponse
    {
        $orderObject = $this->payProcessService->execute($order);

        return redirect($orderObject->confirmation->confirmation_url);
    }

    public function cancel(Payment $order): RedirectResponse
    {
        $this->cancelProcessService->execute($order);

        return redirect()->route('history.index'); //TODO переделать под Payment
    }

    public function capture(Payment $order): RedirectResponse
    {
        $this->captureProcessService->execute($order);

        return redirect()->route('history.index'); //TODO переделать под Payment
    }

    public function refund(Payment $order): RedirectResponse
    {
        $this->refundProcessService->execute($order);

        return redirect()->route('history.index'); //TODO переделать под Payment
    }
}
