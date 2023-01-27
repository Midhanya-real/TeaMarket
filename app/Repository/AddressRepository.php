<?php

namespace App\Repository;

use App\Models\Address;
use Illuminate\Support\LazyCollection;

class AddressRepository implements AddressRepositoryInterface
{

    /**
     * @return LazyCollection
     */
    public function getAll(): LazyCollection
    {
        return Address::select('city', 'house', 'apartment', 'postcode')->lazy();
    }


}
