<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderStatus extends Model
{
    use HasFactory;

    /**
     * Get the order that owns the OrderStatus.
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
