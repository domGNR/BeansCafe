<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    /**
     * Get the client that owns the address.
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get the client that owns the address.
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

}
