<?php

namespace App\Repository;

use App\Models\Order;
use App\Resources\OrderResources\OrderHistoryStatuses;
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

    /**
     * @param Request $request
     * @return LazyCollection
     */
    public function getActive(Request $request): LazyCollection
    {
        return $request->user()->can('viewAny')
            ? Order::whereIn('status', OrderHistoryStatuses::Getting->getActive())
                ->lazy()
            : Order::whereBelongsTo($request->user())
                ->whereIn('status', OrderHistoryStatuses::Getting->getActive())
                ->lazy();
    }

    public function getById(Request $request, Order $order): Order|array
    {
        return $request->user()->can('view', $order)
            ? $order
            : [];
    }
}

