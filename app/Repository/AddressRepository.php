<?php

namespace App\Repository;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\LazyCollection;

class AddressRepository implements AddressRepositoryInterface
{

    /**
     * @param Request $request
     * @return LazyCollection
     */
    public function getAll(Request $request): LazyCollection
    {
        return $request->user()->can('viewAny', Address::class)
            ? Address::lazy()
            : Address::whereBelongsTo($request->user())->lazy();
    }

    public function getById(Request $request, Address $address): Address|array
    {
        return $request->user()->can('view', $address)
            ? $address
            : [];
    }
}
