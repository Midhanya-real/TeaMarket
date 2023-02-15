<?php

namespace App\Services\PaymentProcessingService;

use App\Models\Order;
use App\Services\PaymentService\PayService;
use App\Services\UpdateModelServices\OrderHistoryService;
use App\Services\UpdateModelServices\OrderService;
use Illuminate\Http\Request;
use YooKassa\Request\Payments\CreatePaymentResponse;

class PayProcessService
{
    public function __construct(
        private PayService          $payService,
        private OrderHistoryService $orderHistoryService,
        private OrderService        $orderService,
    )
    {
    }

    private function createPayment(Request $order): CreatePaymentResponse
    {
        return $this->payService->create($order);
    }

    private function createHistoryOrder(Request $order, CreatePaymentResponse $orderObject)
    {
        return $this->orderHistoryService->create($order, $orderObject);
    }

    private function deleteCartOrder(Request $order)
    {
        return $this->orderService->destroy(Order::find($order->id));
    }

    public function execute(Request $order)
    {
        $orderObject = $this->createPayment($order);

        $this->createHistoryOrder(order: $order, orderObject: $orderObject);

        $this->deleteCartOrder($order);

        return $orderObject;
    }
}
