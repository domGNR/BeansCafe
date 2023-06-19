<?php

namespace App\Models;

use App\Models\Product;
use App\Models\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'total','name','surname','state','address','city','zip'
    ];


    /**
     * Get the OrderStatus associated with the order.
     */
    public function orderStatus(): HasOne
    {
        return $this->hasOne(OrderStatus::class);
    }

    /**
     * The products that belong to the order.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
