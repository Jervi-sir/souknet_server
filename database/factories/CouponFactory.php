<?php

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    protected $model = Coupon::class;

    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->regexify('[A-Z0-9]{10}'),
            'description' => $this->faker->text(50),
            'discount_type' => $this->faker->randomElement([1, 2]), // percentage 1, fixed 2
            'discount_amount' => $this->faker->randomFloat(2, 1, 100),
            'date_valid_from' => $this->faker->dateTimeBetween('now', '+1 month'),
            'date_valid_until' => $this->faker->dateTimeBetween('+2 months', '+6 months'),
            'min_order_value' => $this->faker->randomFloat(2, 1, 1000),
            'max_discount_value' => $this->faker->randomFloat(2, 1001, 5000),
        ];
    }
}
