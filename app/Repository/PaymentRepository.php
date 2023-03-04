<?php

namespace App\Repository;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentRepository
{
    public function getAll(Request $request)
    {
        return $request->user()->can('viewAny', Payment::class)
            ? Payment::lazy()
            : [];
    }
}
