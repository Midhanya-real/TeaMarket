<?php

namespace App\Services\PaymentProcessingService;

use App\Models\History;
use App\Services\PaymentService\PayService;
use App\Services\UpdateModelServices\HistoryService;
use YooKassa\Request\Payments\Payment\CreateCaptureResponse;
use YooKassa\Request\Refunds\CreateRefundResponse;

class RefundProcessService
{
    public function __construct(
        private readonly PayService     $payService,
        private readonly HistoryService $orderHistoryService,
    )
    {
    }



    private function createPayment(History $order): CreateRefundResponse
    {
        return $this->payService->refund($order);
    }

    private function updateHistoryOrder(History $order): bool
    {
        $status = ['status' => 'refunded'];

        return $this->orderHistoryService->update($order, $status);
    }

    public function execute(History $order): CreateRefundResponse
    {
        $orderObject = $this->createPayment($order);

        $this->updateHistoryOrder(order: $order);

        return $orderObject;
    }
}
