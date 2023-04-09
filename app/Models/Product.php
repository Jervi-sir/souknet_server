<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use App\Models\Company;
use App\Models\Business;
use App\Models\ProductImage;
use App\Models\ProductPriceHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'current_price', 'stock_left',
        'keywords', 'description_ar', 'description_fr', 'description_en',
        'company_id'
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function getBuyers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'orders', 'product_id', 'user_id');
    }

    public function getOrders(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getImages(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function getPriceHistory(): HasMany
    {
        return $this->hasMany(ProductPriceHistory::class);
    }

    public function getCategories(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_category', 'product_id', 'category_id');
    }
}
