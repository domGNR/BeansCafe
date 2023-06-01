<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    /**
     * Get the product that owns the category.
     */
    protected $fillable = ['name','description'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
