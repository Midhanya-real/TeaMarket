<?php

namespace App\Services\UpdateModelServices;

use App\Models\History;
use Illuminate\Http\Request;
use YooKassa\Request\Payments\CreatePaymentResponse;
use YooKassa\Request\Payments\Payment\CancelResponse;
use YooKassa\Request\Payments\Payment\CreateCaptureResponse;
use YooKassa\Request\Refunds\CreateRefundResponse;

class OrderHistoryService
{
    public function create(Request $request, CreatePaymentResponse $payment)
    {
        return History::create([
            'payment_id' => $payment->id,
            'price' => $payment->amount->value,
            'status' => $payment->status,
            'product_id' => $request->product_id,
            'user_id' => $request->user()->id,
        ]);
    }

    public function update(History $history, CancelResponse|CreateCaptureResponse|array $payment): bool
    {
        return $history->update([
            'status' => $payment['status']
        ]);
    }
}
