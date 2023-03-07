<?php

namespace App\Services\PaymentService\PaymentBuilder;

use App\Models\Order;
use App\Models\User;

interface PaymentBodyBuilderInterface
{
    public function amount(float $price, string $currency): static;

    public function confirmation(string $type, string $url): static;

    public function description(string $description): static;

    public function metadata(int $order_id, int $user_id): static;

    public function testMode(bool $test): static;

    public function getBody(): array;
}
