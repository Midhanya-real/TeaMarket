<?php

namespace App\Services\UpdateModelServices;

use App\Models\Payment;
use App\Services\UpdateModelServices\Interfaces\PaymentServiceInterface;
use Illuminate\Http\Request;
use YooKassa\Request\Payments\CreatePaymentResponse;

class PaymentService implements PaymentServiceInterface
{

    public function create(CreatePaymentResponse $payment)
    {
        return Payment::create([
            'payment_id' => $payment->id,
            'price' => $payment->amount->value,
            'status' => $payment->status,
            'order_id' => $payment->metadata->order_id,
            'user_id' => $payment->metadata->user_id,
        ]);
    }

    public function update(Payment $payment, string $status)
    {
        return $payment->update([
            'status' => $status,
        ]);
    }
}
