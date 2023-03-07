<?php

namespace App\Services\PaymentProcessingService;

use App\Models\History;
use App\Models\Payment;
use App\Services\PaymentService\PayService;
use App\Services\UpdateModelServices\HistoryService;
use App\Services\UpdateModelServices\PaymentService;
use YooKassa\Request\Payments\Payment\CreateCaptureResponse;

class CaptureOrderProcessService
{
    public function __construct(
        private readonly PayService     $payService,
        private readonly PaymentService $orderHistoryService,
    )
    {
    }



    private function createPayment(Payment $order): CreateCaptureResponse
    {
        return $this->payService->capture($order);
    }

    private function updatePaymentOrder(Payment $order, CreateCaptureResponse $orderObject): bool
    {
        return $this->orderHistoryService->update($order, $orderObject->status);
    }

    public function execute(Payment $order): CreateCaptureResponse
    {
        $orderObject = $this->createPayment($order);

        $this->updatePaymentOrder(order: $order, orderObject: $orderObject);

        return $orderObject;
    }
}
