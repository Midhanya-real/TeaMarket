<?php

namespace App\Resources\OrderResources;

enum OrderStatuses: string implements OrderStatusesInterface
{
    case NoPaid = 'no paid';
    case Canceled = 'canceled';
    public function getActive(): array
    {
        return [
            OrderStatuses::NoPaid->value,
        ];
    }

    public function getClosed(): array
    {
        return [
            OrderStatuses::Canceled->value,
        ];
    }
}
