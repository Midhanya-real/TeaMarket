<?php

namespace App\Services\PaymentProcessingService;

use App\Models\History;
use App\Services\PaymentService\PayService;
use App\Services\UpdateModelServices\HistoryService;
use YooKassa\Request\Payments\Payment\CancelResponse;
use YooKassa\Request\Payments\Payment\CreateCaptureResponse;

class CaptureProcessService
{
    public function __construct(
        private readonly PayService     $payService,
        private readonly HistoryService $orderHistoryService,
    )
    {
    }



    private function createPayment(History $order): CreateCaptureResponse
    {
        return $this->payService->capture($order);
    }

    private function updateHistoryOrder(History $order, CreateCaptureResponse $orderObject): bool
    {
        return $this->orderHistoryService->update($order, $orderObject);
    }

    public function execute(History $order): CreateCaptureResponse
    {
        $orderObject = $this->createPayment($order);

        $this->updateHistoryOrder(order: $order, orderObject: $orderObject);

        return $orderObject;
    }
}
