<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    protected $model = ProductImage::class;

    public function definition(): array
    {
        return [
            'product_id' => Product::random()->id,
            'url' => $this->faker->imageUrl(720, 720, 'product', true),
            'meta_keywords' => implode(', ', $this->faker->words($this->faker->numberBetween(2, 5))),
        ];
    }
}
