<?php

namespace App\Services\UpdateModelServices\Interfaces;

use App\Models\Payment;
use Illuminate\Http\Request;
use YooKassa\Request\Payments\CreatePaymentResponse;

interface PaymentServiceInterface
{
    public function create(CreatePaymentResponse $payment);

    public function update(Payment $payment, string $status);
}
