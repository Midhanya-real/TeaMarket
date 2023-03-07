<?php

namespace App\Services\PaymentStatusUpdateService;

use App\Repository\PaymentRepository;
use App\Services\PaymentService\YookassaApi;
use Illuminate\Support\LazyCollection;
use YooKassa\Common\Exceptions\ApiException;
use YooKassa\Common\Exceptions\BadApiRequestException;
use YooKassa\Common\Exceptions\ExtensionNotFoundException;
use YooKassa\Common\Exceptions\ForbiddenException;
use YooKassa\Common\Exceptions\InternalServerError;
use YooKassa\Common\Exceptions\NotFoundException;
use YooKassa\Common\Exceptions\ResponseProcessingException;
use YooKassa\Common\Exceptions\TooManyRequestsException;
use YooKassa\Common\Exceptions\UnauthorizedException;

class StatusUpdateService
{
    public function __construct(
        private readonly YookassaApi       $api,
        private readonly PaymentRepository $orders,
    )
    {
    }

    /**
     * @throws NotFoundException
     * @throws ApiException
     * @throws ResponseProcessingException
     * @throws BadApiRequestException
     * @throws ExtensionNotFoundException
     * @throws InternalServerError
     * @throws ForbiddenException
     * @throws TooManyRequestsException
     * @throws UnauthorizedException
     */
    private function updateStatuses(LazyCollection $orders): void
    {

        foreach ($orders as $order) {
            try {
                $payment = $this->api->getPaymentInfo($order->payment_id);

                if ($payment->status != $order->status) {

                    $order->status = $payment->status;

                    $order->save();
                }
            }catch (BadApiRequestException $exception){
                $order->delete();
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
