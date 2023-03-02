<?php

namespace App\Models;

use App\Resources\OrderResources\PaymentStatuses;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        'status' => PaymentStatuses::class,
    ];

    protected $fillable = [
        'payment_id',
        'price',
        'status',
        'order_id',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
