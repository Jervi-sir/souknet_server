<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('secret'), // password
            'phone_number' => $this->faker->phoneNumber,
            'social_media_list' => json_encode($this->faker->randomElements(['Facebook', 'Twitter', 'Instagram', 'LinkedIn'], $this->faker->numberBetween(1, 4))),
            'bio' => $this->faker->text(50),
            'location' => $this->faker->address,
            'gender' => $this->faker->randomElement([1, 2, 3]),
            'birthday' => $this->faker->dateTimeBetween('-50 years', '-10 years'),
            'wilaya_number' => $this->faker->numberBetween(1, 48),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
