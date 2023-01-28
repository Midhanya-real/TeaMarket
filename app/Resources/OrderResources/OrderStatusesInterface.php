<?php

namespace App\Resources\OrderResources;

interface OrderStatusesInterface
{
    public function getActive(): array;

    public function getCart(): array;

    public function getClosed(): array;
}
