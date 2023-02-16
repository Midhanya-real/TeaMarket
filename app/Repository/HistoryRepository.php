<?php

namespace App\Repository;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\LazyCollection;

class HistoryRepository
{
    public function getAll(Request $request): LazyCollection
    {
        return $request->user()->can('viewAny', History::class)
            ? History::lazy()
            : History::whereBelongsTo($request->user())->lazy();
    }
}
