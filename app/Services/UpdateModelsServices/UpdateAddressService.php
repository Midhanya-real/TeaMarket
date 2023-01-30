<?php

namespace App\Services\UpdateModelsServices;

use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressService
{

    /**
     * @param StoreAddressRequest $request
     * @return array
     */
    public function create(StoreAddressRequest $request): array
    {
       return [
           'country' => $request->country,
           'city' => $request->city,
           'street' => $request->street,
           'house' => $request->house,
           'apartment' => $request->apartment,
           'postcode' => $request->postcode,
           'user_id' => $request->user()->id,
       ];
    }

    /**
     * @param UpdateAddressRequest $request
     * @return array
     */
    public function update(UpdateAddressRequest $request): array
    {
        return [
            'country' => $request->country,
            'city' => $request->city,
            'house' => $request->house,
            'apartment' => $request->apartment,
            'postcode' => $request->postcode,
        ];
    }
}
