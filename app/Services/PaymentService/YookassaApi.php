<?php

namespace App\Services\PaymentService;

use YooKassa\Client;
use YooKassa\Request\Payments\CreatePaymentResponse;
use YooKassa\Request\Payments\Payment\CancelResponse;
use YooKassa\Request\Payments\Payment\CreateCaptureResponse;

class YookassaApi
{
    public function __construct(
        private array  $config,

        private Client $client,
    )
    {
        $this->config = config('payment.yookassa');
        $this->client = new Client();
        $this->client->setAuth($this->config['market_id'], $this->config['secret_key']);
    }

    public function createPayment(array $paymentData): CreatePaymentResponse
    {
        return $this->client->createPayment($paymentData, uniqid('', true));
    }

    public function capturePayment(string $paymentId, $paymentData): CreateCaptureResponse
    {
        return $this->client->capturePayment($paymentData, $paymentId, uniqid('', true));
    }

    public function cancelPayment(string $paymentId): CancelResponse
    {
        return $this->client->cancelPayment($paymentId, uniqid('', true));
    }
}
