<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\Service;
use App\Models\CompanyImage;
use App\Models\CompanyPrivilege;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'password', 'phone_number', 'social_media_list', 
        'description_ar', 'description_fr', 'description_en',
        'location', 'wilaya_number',
        'company_privilege_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getPrivilege() :BelongsTo
    {
        return $this->belongsTo(CompanyPrivilege::class);
    }

    public function getImages() :HasMany
    {
        return $this->hasMany(CompanyImage::class);
    }

    public function getServices() :HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function getProducts() :HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getFollowers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_company', 'company_id', 'user_id');
    }
}
