<?php

namespace App\Services\PaymentService\PaymentBuilder;

interface PaymentBodyBuilderInterface
{
    public function amount(float $price, string $currency): static;

    public function confirmation(string $type, string $url): static;

    public function description(string $description): static;

    public function testMode(bool $test): static;

    public function getBody(): array;
}
