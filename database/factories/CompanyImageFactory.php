<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\CompanyImage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanyImage>
 */
class CompanyImageFactory extends Factory
{
    protected $model = CompanyImage::class;

    public function definition(): array
    {
        return [
            'company_id' => Company::random()->id,
            'url' => $this->faker->imageUrl(640, 640, 'business', true),
            'meta_keywords' => implode(', ', $this->faker->words($this->faker->numberBetween(2, 5))),
        ];
    }
}
