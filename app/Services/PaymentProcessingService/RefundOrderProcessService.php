<?php

namespace App\Services\PaymentProcessingService;

use App\Models\Payment;
use App\Resources\OrderResources\PaymentStatuses;
use App\Services\PaymentService\PayService;
use App\Services\UpdateModelServices\PaymentService;
use YooKassa\Request\Refunds\CreateRefundResponse;

class RefundOrderProcessService
{
    public function __construct(
        private readonly PayService     $payService,
        private readonly PaymentService $orderHistoryService,
    )
    {
    }



    private function createPayment(Payment $order): CreateRefundResponse
    {
        return $this->payService->refund($order);
    }

    private function updatePaymentOrder(Payment $order): bool
    {
        return $this->orderHistoryService->update($order, PaymentStatuses::Refunded->value);
    }

    public function execute(Payment $order): CreateRefundResponse
    {
        $orderObject = $this->createPayment($order);

        $this->updatePaymentOrder(order: $order);

        return $orderObject;
    }
}
