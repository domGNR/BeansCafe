<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Order;
use App\Models\Photo;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;


    protected $fillable = ['name','description','stock_qty','price','cover','is_show','brand_id','category_id'];

    /**
     * Get the photos for the product.
     */
    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }

    /**
     * Get the category associated with the product.
     */
    public function category(): HasOne
    {
        return $this->hasOne(Category::class);
    }

    /**
     * Get the brand associated with the product.
     */
    public function brand(): HasOne
    {
        return $this->hasOne(Brand::class);
    }

    /**
     * The orders that belong to the product.
     */
    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }
}
