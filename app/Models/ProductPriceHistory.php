<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductPriceHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'price'
    ];

    public function getProduct() :BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
