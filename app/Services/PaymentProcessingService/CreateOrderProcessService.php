<?php

namespace App\Services\PaymentProcessingService;

use App\Services\PaymentService\PayService;
use App\Services\UpdateModelServices\PaymentService;
use Illuminate\Http\Request;
use YooKassa\Request\Payments\CreatePaymentResponse;

class CreateOrderProcessService
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

    private function createPaymentOrder(CreatePaymentResponse $orderObject)
    {
        return $this->paymentService->create($orderObject);
    }

    public function execute(Request $order): CreatePaymentResponse
    {
        $orderObject = $this->createPayment($order);

        $this->createPaymentOrder(orderObject: $orderObject);

        return $orderObject;
    }
}
