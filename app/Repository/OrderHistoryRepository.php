<?php

namespace App\Repository;

use App\Models\OrderHistory;
use Illuminate\Support\LazyCollection;

class OrderHistoryRepository
{
    public function index(): LazyCollection
    {
        return OrderHistory::lazy();
    }
}
