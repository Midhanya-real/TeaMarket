<?php

namespace App\Services\PaymentService;

use App\Actions\Payments\PaymentBodyParser;
use App\Models\Order;
use App\Models\Payment;
use App\Services\PaymentService\PaymentBuilder\PaymentBodyBuilder;
use Illuminate\Http\Request;
use YooKassa\Model\CurrencyCode;
use YooKassa\Request\Payments\CreatePaymentResponse;
use YooKassa\Request\Payments\Payment\CancelResponse;
use YooKassa\Request\Payments\Payment\CreateCaptureResponse;
use YooKassa\Request\Refunds\CreateRefundResponse;

class PayService
{
    public function __construct(
        private readonly YookassaApi        $payment,
        private readonly PaymentBodyBuilder $paymentBodyBuilder,
        private readonly PaymentBodyParser  $parser,
    )
    {
    }

    public function create(Request $order): CreatePaymentResponse
    {
        $body = $this->paymentBodyBuilder
            ->amount(price: $order->price, currency: CurrencyCode::RUB)
            ->confirmation(type: $order->type, url: $order->url)
            ->description(description: $this->parser->getDescription($order))
            ->metadata(order_id: $order->id,user_id: $order->user_id)
            ->testMode(test: true)
            ->getBody();

        return $this->payment->createPayment($body);
    }

    public function cancel(Payment $order): CancelResponse
    {
        return $this->payment->cancelPayment($order->payment_id);
    }

    public function capture(Payment $order): CreateCaptureResponse
    {
        $amount = $this->payment->getPaymentInfo($order->payment_id)->amount;

        return $this->payment->capturePayment($order->payment_id, [$amount]);
    }

    public function refund(Payment $order): CreateRefundResponse
    {
        $amount = $this->payment->getPaymentInfo($order->payment_id)->amount;

        $paymentData = [
            'amount' => $amount,
            'payment_id' => $order->payment_id
        ];

        return $this->payment->createRefund($paymentData);
    }
}
