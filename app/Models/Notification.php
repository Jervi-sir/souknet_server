<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Notification extends Model
{
    use HasFactory;

    public static function random()
    {
        return self::inRandomOrder()->first();
    }

    public function companiesFollowing(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
