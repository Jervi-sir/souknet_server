<?php

namespace Database\Factories;

use App\Models\CompanyPrivilege;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanyPrivilege>
 */
class CompanyPrivilegeFactory extends Factory
{
    protected $model = CompanyPrivilege::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}
