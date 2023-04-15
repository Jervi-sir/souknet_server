<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use App\Models\FavoriteProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FavoriteProduct>
 */
class FavoriteProductFactory extends Factory
{
    protected $model = FavoriteProduct::class;

    public function definition(): array
    {
        return [
            'product_id' => Product::random()->id,
            'user_id' => User::random()->id,
        ];
    }
}
