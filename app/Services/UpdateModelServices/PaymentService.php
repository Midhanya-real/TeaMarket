<?php

namespace App\Services\UpdateModelServices;

use App\Models\Payment;
use App\Services\UpdateModelServices\Interfaces\PaymentServiceInterface;
use Illuminate\Http\Request;
use YooKassa\Request\Payments\CreatePaymentResponse;

class PaymentService implements PaymentServiceInterface
{

    public function create(Request $request, CreatePaymentResponse $payment)
    {
        return Payment::create([
            'payment_id' => $payment->id,
            'price' => $payment->amount->value,
            'status' => $payment->status,
            'order_id' => $request->id,
            'user_id' => $request->user()->id,
        ]);
    }

    public function update(Payment $payment, string $status)
    {
        return $payment->update([
            'status' => $status,
        ]);
    }
}
