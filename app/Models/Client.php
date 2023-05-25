<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    /**
     * Get the user associated with the client.
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    /**
     * Get the addresses for the client.
     */
    public function address(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    /**
     * Get the orders for the client.
     */
    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }


}
