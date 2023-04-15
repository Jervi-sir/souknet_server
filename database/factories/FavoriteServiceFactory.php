<?php

namespace Database\Factories;

use App\Models\FavoriteService;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FavoriteService>
 */
class FavoriteServiceFactory extends Factory
{
    protected $model = FavoriteService::class;

    public function definition(): array
    {
        return [
            'service_id' => Service::random()->id,
            'user_id' => User::random()->id,
        ];
    }
}
