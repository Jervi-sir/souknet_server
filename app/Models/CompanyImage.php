<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyImage extends Model
{
    use HasFactory;

    public static function random()
    {
        return self::inRandomOrder()->first();
    }

    protected $hidden = [
        'id',
        'company_id',
        'created_at', 'updated_at'
    ];

    protected $fillable = [
        'company_id', 'url', 'meta_keywords'
    ];

    public function getCompany(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
