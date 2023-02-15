<?php

namespace App\Resources\OrderResources;

enum OrderHistoryStatuses: string implements OrderStatusesInterface
{
    case Pending = 'pending';
    case Waiting = 'waiting_for_capture';
    case Succeeded = 'succeeded';
    case Canceled = 'canceled';

    case Refunded = 'refunded';

    public function getActive(): array
    {
        return [
            OrderHistoryStatuses::Pending->value,
            OrderHistoryStatuses::Waiting->value,
        ];
    }

    public function getClosed(): array
    {
        return [
            OrderHistoryStatuses::Succeeded->value,
            OrderHistoryStatuses::Canceled->value,
            OrderHistoryStatuses::Refunded->value,
        ];
    }
}
