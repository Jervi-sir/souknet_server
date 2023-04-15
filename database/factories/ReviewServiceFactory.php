<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Service;
use App\Models\ReviewService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReviewService>
 */
class ReviewServiceFactory extends Factory
{

    protected $model = ReviewService::class;

    public function definition(): array
    {
        return [
            'service_id' => Service::random()->id,
            'user_id' => User::random()->id,
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->text(200),
        ];
    }
}
