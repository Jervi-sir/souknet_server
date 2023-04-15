<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Order;
use App\Models\Company;
use App\Models\Product;
use App\Models\Service;
use App\Models\UserImage;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password',
        'phone_number', 'social_media_list',
        'bio', 'location', 'gender', 'birthday',
        'wilaya_number'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function random()
    {
        return self::inRandomOrder()->first();
    }

    public function getProducts(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'orders', 'user_id', 'product_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function getImages(): HasMany
    {
        return $this->hasMany(UserImage::class);
    }

    public function companiesFollowing(): BelongsToMany
    {
        return $this->belongsToMany(Company::class);
    }

    public function favoriteProducts()
    {
        return $this->belongsToMany(Product::class, 'favorite_products');
    }

    public function favoriteServices()
    {
        return $this->belongsToMany(Service::class, 'favorite_services');
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }
}
