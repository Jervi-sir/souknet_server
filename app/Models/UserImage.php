<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'url', 'meta_keywords'
    ];

    public static function random()
    {
        return self::inRandomOrder()->first();
    }

    public function getUser(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
