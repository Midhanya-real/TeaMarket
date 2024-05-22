<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Repository\PaymentRepository;
use App\Services\PaymentProcessingService\CancelOrderProcessService;
use App\Services\PaymentProcessingService\CaptureOrderProcessService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminPaymentController extends Controller
{
    public function __construct(
        private readonly PaymentRepository          $paymentRepository,
        private readonly CancelOrderProcessService  $cancelProcessService,
        private readonly CaptureOrderProcessService $captureProcessService,
    )
    {
    }

    public function index(Request $request): View|RedirectResponse
    {
        $payments = $this->paymentRepository->getAll($request);

        return view('admin.payments', ['orders' => $payments]);
    }

    public function cancel(Payment $order): RedirectResponse
    {
        $this->cancelProcessService->execute($order);

        return redirect()->route('admin.payments.index');
    }

    public function capture(Payment $order): RedirectResponse
    {
        $this->captureProcessService->execute($order);

        return redirect()->route('admin.payments.index');
    }
}
