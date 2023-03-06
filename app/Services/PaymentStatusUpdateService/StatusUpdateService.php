<?php

namespace App\Services\PaymentStatusUpdateService;

use App\Repository\PaymentRepository;
use App\Services\PaymentService\YookassaApi;
use Illuminate\Support\LazyCollection;

class StatusUpdateService
{
    public function __construct(
        private readonly YookassaApi       $api,
        private readonly PaymentRepository $orders,
    )
    {
    }

    private function updateStatuses(LazyCollection $orders): void
    {
        foreach ($orders as $order) {
            $updatedStatus = $this->api->getPaymentInfo($order->payment_id)->status;

            if ($updatedStatus != $order->status) {

                $order->status = $updatedStatus;

                $order->save();
            }
        }
    }

    /**
     *
     */
    public function execute(): void
    {
        $orders = $this->orders->getActive();

        $this->updateStatuses($orders);
    }
}
