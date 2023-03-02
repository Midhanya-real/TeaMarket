<?php

namespace App\Services\PaymentProcessingService;

use App\Models\Order;
use App\Services\PaymentService\PayService;
use App\Services\UpdateModelServices\OrderService;
use App\Services\UpdateModelServices\PaymentService;
use Illuminate\Http\Request;
use YooKassa\Request\Payments\CreatePaymentResponse;

class PayProcessService
{
    public function __construct(
        private readonly PayService     $payService,
        private readonly PaymentService $paymentService,
    )
    {
    }

    private function createPayment(Request $order): CreatePaymentResponse
    {
        return $this->payService->create($order);
    }

    private function createPaymentOrder(Request $order, CreatePaymentResponse $orderObject)
    {
        return $this->paymentService->create($order, $orderObject);
    }

    public function execute(Request $order): CreatePaymentResponse
    {
        $orderObject = $this->createPayment($order);

        $this->createPaymentOrder(order: $order, orderObject: $orderObject);

        return $orderObject;
    }
}
