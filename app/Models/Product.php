<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use App\Models\Business;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'orders', 'product_id', 'user_id');
    }

    public function orders(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
    
}
