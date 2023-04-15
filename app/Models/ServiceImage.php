<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id', 'url', 'meta_keywords',
    ];

    public static function random()
    {
        return self::inRandomOrder()->first();
    }

    public function getService(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
