<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserImage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserImage>
 */
class UserImageFactory extends Factory
{
    protected $model = UserImage::class;

    public function definition(): array
    {
        return [
            'user_id' => User::random()->id,
            'url' => $this->faker->imageUrl(640, 640, 'user', true),
            'meta_keywords' => implode(', ', $this->faker->words($this->faker->numberBetween(2, 5))),
        ];
    }
}
