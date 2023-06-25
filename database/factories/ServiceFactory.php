<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Service;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition(): array
    {
        $category = Category::inRandomOrder()->first();
        return [
            'company_id' => Company::random()->id,
            'name' => $this->faker->bs,
            'current_price' => $this->faker->randomFloat(2, 1, 1000),
            'keywords' => implode(', ', $this->faker->words($this->faker->numberBetween(2, 5))),
            'description_ar' => $this->faker->text,
            'description_fr' => $this->faker->text,
            'description_en' => $this->faker->text,
            'duration' => $this->faker->time('H:i'),
            'status' => $this->faker->randomElement([0, 1]), // 0: archived, 1: active
            'category_id' => $category->id,
        ];
    }
}
