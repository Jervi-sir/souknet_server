<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use App\Models\ReviewProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReviewProduct>
 */
class ReviewProductFactory extends Factory
{
    protected $model = ReviewProduct::class;

    public function definition(): array
    {
        return [
            'product_id' => Product::random()->id,
            'user_id' => User::random()->id,
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->text(200),
        ];
    }
}
