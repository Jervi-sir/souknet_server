<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{

    protected $model = Order::class;

    public function definition(): array
    {
        $product = Product::random();
        $quantity = $this->faker->numberBetween(1, 10);
        return [
            'product_id' => $product->id,
            'user_id' => User::random()->id,
            'quantity' => $quantity,
            'ordered_price' => $quantity * $product->current_price,
            'destination' => $this->faker->address,
            'location' => $this->faker->latitude . ', ' . $this->faker->longitude,
            'order_status' => $this->faker->randomElement([1, 2, 3, 4]), // 1: pending, 2: processing, 3: completed, 4: canceled
        ];
    }
}
