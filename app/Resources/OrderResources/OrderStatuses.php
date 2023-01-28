<?php

namespace App\Resources\OrderResources;

enum OrderStatuses: string implements OrderStatusesInterface
{
    case Getting = 'getting';
    case Transit = 'transit';
    case Paid = 'paid';

    case NoPaid = 'nopaid';

    case Closed = 'closed';
    case Suspend = 'suspend';
    case Canceled = 'canceled';

    public function getActive(): array
    {
        return [
            OrderStatuses::Paid->value,
            OrderStatuses::Getting->value,
            OrderStatuses::Transit->value,
        ];
    }

    public function getCart(): array
    {
        return [
            OrderStatuses::NoPaid->value,
        ];
    }

    public function getClosed(): array
    {
        return [
            OrderStatuses::Closed->value,
            OrderStatuses::Suspend->value,
            OrderStatuses::Canceled->value,
        ];
    }
}
