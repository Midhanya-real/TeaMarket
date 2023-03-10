<?php

namespace App\Repository;

use App\Models\Order;
use App\Resources\OrderResources\PaymentStatuses;
use Illuminate\Http\Request;
use Illuminate\Support\LazyCollection;

class OrderRepository implements OrderRepositoryInterface
{
    /**
     * @param Request $request
     * @return LazyCollection
     */
    public function getAll(Request $request): LazyCollection
    {
        return $request->user()->can('viewAny')
            ? Order::lazy()
            : Order::whereBelongsTo($request->user())->lazy();
    }
}

