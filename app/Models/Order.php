<?php

namespace App\Models;

use App\Resources\OrderResources\OrderStatuses;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_at',
        'updated_at',
        'status',
        'count',
        'user_id',
        'product_id',
    ];

    protected $casts = [
        'status' => OrderStatuses::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
