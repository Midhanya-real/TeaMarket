<?php

namespace App\Services\UpdateModelServices\Interfaces;

use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;

interface AddressServiceInterface
{
    public function store(StoreAddressRequest $request);

    public function update(UpdateAddressRequest $request, Address $address);

    public function destroy(Request $request, Address $address);
}
