<?php

namespace App\Resources\OrderResources;

enum PaymentStatuses: string
{
    case Pending = 'pending';
    case Waiting = 'waiting_for_capture';
    case Succeeded = 'succeeded';
    case Canceled = 'canceled';

    case Refunded = 'refunded';
}
