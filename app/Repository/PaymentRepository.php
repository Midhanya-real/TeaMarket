<?php

namespace App\Repository;

use App\Models\Payment;
use App\Resources\OrderResources\PaymentStatuses;
use Illuminate\Http\Request;

class PaymentRepository
{
    public function getAll(Request $request)
    {
        return $request->user()->can('viewAny', Payment::class)
            ? Payment::lazy()
            : [];
    }

    public function getActive()
    {
        return Payment::whereNotIn('status', [PaymentStatuses::Refunded->value, PaymentStatuses::Canceled->value])
            ->lazy();
    }
}
