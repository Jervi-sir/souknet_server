<?php

namespace App\Models;

use App\Models\Company;
use App\Models\CompanyImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id', 'name', 
        'description_ar', 'description_fr', 'description_en',
        'keywords', 'current_price',
    ];

    public function getCompany(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function getImages() :HasMany
    {
        return $this->hasMany(CompanyImage::class);
    }
}
