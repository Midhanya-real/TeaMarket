<?php

namespace App\Repository;

use App\Models\Order;
use App\Resources\OrderResources\OrderStatuses;
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
            ? Order::select('status', 'created_at', 'updated_at')->lazy()
            : Order::whereBelongsTo($request->user())->select('status', 'created_at', 'updated_at')->lazy();
    }

    /**
     * @param Request $request
     * @return LazyCollection
     */
    public function getActive(Request $request): LazyCollection
    {
        return $request->user()->can('viewAny')
            ? Order::select('status', 'created_at', 'updated_at')
                ->whereIn('status', OrderStatuses::Getting->getActive())
                ->lazy()
            : Order::whereBelongsTo($request->user())
                ->select('status', 'created_at', 'updated_at')
                ->whereIn('status', OrderStatuses::Getting->getActive())
                ->lazy();
    }

    public function getById(Request $request, Order $order): Order|array
    {
        return $request->user()->can('view', $order)
            ? $order->select('status', 'created_at', 'updated_at')->first()
            : [];
    }
}

