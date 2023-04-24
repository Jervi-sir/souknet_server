<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    protected $model = Product::class;

    public function definition(): array
    {
        $subCategory = SubCategory::inRandomOrder()->first();
        return [
            'company_id' => Company::random()->id,
            'name' => $this->faker->name,
            'current_price' => $this->faker->randomFloat(2, 1, 1000),
            'keywords' => implode(', ', $this->faker->words($this->faker->numberBetween(2, 5))),
            'description_ar' => $this->faker->text,
            'description_fr' => $this->faker->text,
            'description_en' => $this->faker->text,
            'status' => $this->faker->randomElement([0, 1]), // 0: archived, 1: active
            'category_id' => $subCategory->category,
            'sub_category_id' => $subCategory->id,
        ];
    }
}
