<?php

namespace App\Services\PaymentService;

use YooKassa\Client;
use YooKassa\Model\PaymentInterface;
use YooKassa\Request\Payments\CreatePaymentResponse;
use YooKassa\Request\Payments\Payment\CancelResponse;
use YooKassa\Request\Payments\Payment\CreateCaptureResponse;
use YooKassa\Request\Payments\PaymentResponse;
use YooKassa\Request\Payments\PaymentsResponse;
use YooKassa\Request\Refunds\CreateRefundResponse;

class YookassaApi
{
    public function __construct(
        private array  $config,

        private Client $client,
    )
    {
        $this->client->setAuth($this->config['market_id'], $this->config['secret_key']);
    }

    public function createPayment(array $paymentData): CreatePaymentResponse
    {
        return $this->client->createPayment($paymentData, uniqid('', true));
    }

    public function createRefund(array $paymentData): CreateRefundResponse
    {
        return $this->client->createRefund($paymentData, uniqid('', true));
    }

    public function capturePayment(string $paymentId, array $paymentData): CreateCaptureResponse
    {
        return $this->client->capturePayment($paymentData, $paymentId, uniqid('', true));
    }

    public function cancelPayment(string $paymentId): CancelResponse
    {
        return $this->client->cancelPayment($paymentId, uniqid('', true));
    }

    public function getPayments(): PaymentsResponse
    {
        return $this->client->getPayments();
    }

    public function getPaymentInfo(string $paymentId): PaymentResponse|PaymentInterface|null
    {
        return $this->client->getPaymentInfo($paymentId);
    }
}
