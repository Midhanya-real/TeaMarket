<?php

namespace App\Services\PaymentService\PaymentBuilder;

use App\Models\Order;

class PaymentBodyBuilder implements PaymentBodyBuilderInterface
{
    private array $body;
    public function amount(float $price, string $currency): static
    {
        $amount = [
            'value' => $price,
            'currency' => $currency,
        ];

        $this->body['amount'] = $amount;

        return $this;
    }

    public function confirmation(string $type, string $url): static
    {
        $confirmation = [
            'type' => $type,
            'return_url' => $url,
        ];

        $this->body['confirmation'] = $confirmation;

        return $this;
    }

    public function description(string $description): static
    {
        $this->body['description'] = $description;

        return $this;
    }

    public function testMode(bool $test): static
    {
        $this->body['test'] = $test;
        return $this;
    }

    public function getBody(): array
    {
        return $this->body;
    }
}
