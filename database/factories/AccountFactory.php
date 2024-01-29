<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'account_number' => $this->faker->unique()->regexify('[0-9A-Za-z]{11}'),
            'account_name' => $this->faker->randomElement(['Current', 'Savings', 'Investments', 'Pension']),
            'currency' => 'NOK',
        ];
    }
}
