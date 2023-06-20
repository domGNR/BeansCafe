<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'total','name','surname','address','city','zip','status_id','tracking','user_id'
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
        return $this->belongsToMany(Product::class,'orders_products')->withPivot('qty');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
