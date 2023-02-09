<?php

namespace App\Services\UpdateModelServices;

use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Models\Address;
use App\Services\UpdateModelServices\Interfaces\AddressServiceInterface;
use Illuminate\Http\Request;

class AddressService implements AddressServiceInterface
{

    public function store(StoreAddressRequest $request)
    {
        return Address::create([
            'country' => $request->country,
            'city' => $request->city,
            'street' => $request->street,
            'house' => $request->house,
            'apartment' => $request->apartment,
            'postcode' => $request->postcode,
            'user_id' => $request->user_id,
        ]);
    }

    public function update(UpdateAddressRequest $request, Address $address)
    {
        return $address->update([
            'country' => $request->country,
            'city' => $request->city,
            'street' => $request->street,
            'house' => $request->house,
            'apartment' => $request->apartment,
            'postcode' => $request->postcode,
        ]);
    }

    public function destroy(Request $request, Address $address)
    {
        return $request->user()->can('delete', $address)
            ? $address->delete()
            : false;
    }
}
