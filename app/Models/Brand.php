<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Brand extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name'
    ];

    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }
}
