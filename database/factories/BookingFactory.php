<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition(): array
    {
        return [
            'service_id' => Service::random()->id,
            'user_id' => User::random()->id,
            'date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'subject' => $this->faker->text(50),
            'message' => $this->faker->text(200),
        ];
    }
}
