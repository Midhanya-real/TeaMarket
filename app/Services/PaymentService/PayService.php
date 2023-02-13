<?php

namespace App\Services\PaymentService;

use App\Actions\Payments\PaymentBodyParser;
use App\Services\PaymentService\PaymentBuilder\PaymentBodyBuilder;
use Illuminate\Http\Request;

class PayService
{
    public function __construct(
        private YookassaApi        $payment,
        private PaymentBodyBuilder $paymentBodyBuilder,
        private PaymentBodyParser $parser,
    )
    {
    }

    public function create(Request $order)
    {
        $body = $this->paymentBodyBuilder
            ->amount(price: $order->price, currency: 'RUB')
            ->confirmation(type: $order->type,url: $order->url)
            ->description(description: $this->parser->getDescription($order))
            ->testMode(test: true)
            ->getBody();

        return $this->payment->createPayment($body);
    }
}
