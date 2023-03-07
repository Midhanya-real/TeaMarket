<?php

namespace App\Services\PaymentProcessingService;

use App\Models\History;
use App\Models\Order;
use App\Models\Payment;
use App\Services\PaymentService\PayService;
use App\Services\UpdateModelServices\HistoryService;
use App\Services\UpdateModelServices\PaymentService;
use YooKassa\Request\Payments\Payment\CancelResponse;

class CancelOrderProcessService
{

    public function __construct(
        private readonly PayService     $payService,
        private readonly PaymentService $orderHistoryService,
    )
    {
    }

    private function createPayment(Payment $order): CancelResponse
    {
        return $this->payService->cancel($order);
    }

    private function updatePaymentOrder(Payment $order, CancelResponse $orderObject)
    {
        return $this->orderHistoryService->update($order, $orderObject->status);
    }

    public function execute(Payment $order): CancelResponse
    {
        $orderObject = $this->createPayment($order);

        $this->updatePaymentOrder(order: $order, orderObject: $orderObject);

        return $orderObject;
    }
}
