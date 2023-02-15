<?php

namespace App\Models;

use App\Resources\OrderResources\OrderHistoryStatuses;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class History extends Model
{
    use HasFactory;

    protected $primaryKey = 'payment_id';

    public $incrementing = false;

    public $timestamps = false;

    protected $casts = [
        'status' => OrderHistoryStatuses::class,
    ];

    protected $fillable = [
        'payment_id',
        'price',
        'status',
        'product_id',
        'user_id',
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
