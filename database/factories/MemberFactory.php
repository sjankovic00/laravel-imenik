<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName,
            'surname' => fake()->lastName,
            'phone_number' => fake()->phoneNumber,
            'address' => fake()->address,
            'email' => fake()->unique()->safeEmail,
            'description' => fake()->paragraph,
            'website' => fake()->url,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
