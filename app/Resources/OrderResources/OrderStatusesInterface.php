<?php

namespace App\Resources\OrderResources;

interface OrderStatusesInterface
{
    public function getActive(): array;

    public function getClosed(): array;
}
