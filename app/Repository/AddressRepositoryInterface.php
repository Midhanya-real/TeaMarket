<?php

namespace App\Repository;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\LazyCollection;
use Ramsey\Collection\Collection;

interface AddressRepositoryInterface
{
    public function getAll(Request $request): LazyCollection;
    public function getById(Request $request, Address $address): Address|array;
}
