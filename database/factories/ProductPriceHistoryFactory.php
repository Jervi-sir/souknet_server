<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductPriceHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductPriceHistory>
 */
class ProductPriceHistoryFactory extends Factory
{
    protected $model = ProductPriceHistory::class;

    public function definition(): array
    {
        return [
            'product_id' => Product::random()->id,
            'price' => $this->faker->randomFloat(2, 1, 1000),
        ];
    }
}
