<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\CompanyPrivilege;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'email' => $this->faker->unique()->companyEmail,
            'password' => bcrypt('secret'), // password
            'phone_number' => $this->faker->phoneNumber,
            'social_media_list' => json_encode($this->faker->randomElements(['Facebook', 'Twitter', 'Instagram', 'LinkedIn'], $this->faker->numberBetween(1, 4))),
            'description_ar' => $this->faker->text,
            'description_fr' => $this->faker->text,
            'description_en' => $this->faker->text,
            'address' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'zip_code' => $this->faker->postcode,
            'country' => $this->faker->country,
            'phone_number' => $this->faker->phoneNumber,
            'website' => $this->faker->url,
            'wilaya_number' => $this->faker->numberBetween(1, 48),
            'company_privilege_id' => CompanyPrivilege::random()->id,
            'is_verified' => $this->faker->boolean,
        ];
    }
}
