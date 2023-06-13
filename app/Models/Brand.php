<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;

    /**
     * Get the product that owns the brand.
     */

     protected $fillable = ['name','slug'];


    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
