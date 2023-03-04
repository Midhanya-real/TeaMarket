<?php

namespace App\Services\UpdateModelServices\Interfaces;

use Illuminate\Http\Request;
use YooKassa\Request\Payments\CreatePaymentResponse;

interface PaymentServiceInterface
{
    public function create(Request $request, CreatePaymentResponse $payment);
}
