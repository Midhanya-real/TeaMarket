<?php

namespace App\Repository;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\LazyCollection;

class OrderHistoryRepository
{
    public function index(Request $request): LazyCollection
    {
        return $request->user()->can('viewAny', History::class)
            ? History::lazy()
            : History::whereBelongsTo($request->user())->lazy();
    }
}
