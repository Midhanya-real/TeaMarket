<?php

namespace App\Services\PaymentProcessingService;

use App\Models\History;
use App\Services\PaymentService\PayService;
use App\Services\UpdateModelServices\OrderHistoryService;
use YooKassa\Request\Payments\Payment\CancelResponse;

class CancelProcessService
{

    public function __construct(
        private readonly PayService          $payService,
        private readonly OrderHistoryService $orderHistoryService,
    )
    {
    }

    private function createPayment(History $order): CancelResponse
    {
        return $this->payService->cancel($order);
    }

    private function updateHistoryOrder(History $order, CancelResponse $orderObject): bool
    {
        return $this->orderHistoryService->update($order, $orderObject);
    }

    public function execute(History $order): CancelResponse
    {
        $orderObject = $this->createPayment($order);

        $this->updateHistoryOrder(order: $order, orderObject: $orderObject);

        return $orderObject;
    }
}
