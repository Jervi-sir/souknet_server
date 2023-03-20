<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'url', 'meta_keywords'
    ];

    public function getProduct() :BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
