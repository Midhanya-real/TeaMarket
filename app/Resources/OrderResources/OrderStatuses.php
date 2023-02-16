<?php

namespace App\Resources\OrderResources;

enum OrderStatuses: string
{
    case NoPaid = 'no paid';
    case Canceled = 'canceled';
}
