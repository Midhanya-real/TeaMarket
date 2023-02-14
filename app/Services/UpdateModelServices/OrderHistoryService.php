<?php

namespace App\Services\UpdateModelServices;

use App\Models\OrderHistory;
use Illuminate\Http\Request;
use YooKassa\Request\Payments\CreatePaymentResponse;
use YooKassa\Request\Payments\Payment\CancelResponse;

class OrderHistoryService
{
    public function create(Request $request, CreatePaymentResponse $payment)
    {
        return OrderHistory::create([
            'payment_id' => $payment->id,
            'price' => $payment->amount->value,
            'status' => $payment->status,
            'product_id' => $request->product_id,
            'user_id' => $request->user()->id,
        ]);
    }

    public function update(OrderHistory $history, CancelResponse $payment)
    {
        return $history->update([
            'status' => $payment->status
        ]);
    }
}
