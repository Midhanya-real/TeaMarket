<?php

namespace App\Services\PaymentService;

use App\Actions\Payments\PaymentBodyParser;
use App\Models\OrderHistory;
use App\Services\PaymentService\PaymentBuilder\PaymentBodyBuilder;
use Illuminate\Http\Request;
use YooKassa\Request\Payments\CreatePaymentResponse;
use YooKassa\Request\Payments\Payment\CancelResponse;

class PayService
{
    public function __construct(
        private YookassaApi        $payment,
        private PaymentBodyBuilder $paymentBodyBuilder,
        private PaymentBodyParser $parser,
    )
    {
    }

    public function create(Request $order): CreatePaymentResponse
    {
        $body = $this->paymentBodyBuilder
            ->amount(price: $order->price, currency: 'RUB')
            ->confirmation(type: $order->type,url: $order->url)
            ->description(description: $this->parser->getDescription($order))
            ->testMode(test: true)
            ->getBody();

        return $this->payment->createPayment($body);
    }

    public function cancel(OrderHistory $order): CancelResponse
    {
        return $this->payment->cancelPayment($order->payment_id);
    }
}
