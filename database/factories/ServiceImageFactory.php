<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\ServiceImage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceImage>
 */
class ServiceImageFactory extends Factory
{
    protected $model = ServiceImage::class;

    public function definition(): array
    {
        return [
            'service_id' => Service::random()->id,
            'url' => $this->faker->imageUrl(720, 720, 'service', true),
            'meta_keywords' => implode(', ', $this->faker->words($this->faker->numberBetween(2, 5))),
        ];
    }
}
