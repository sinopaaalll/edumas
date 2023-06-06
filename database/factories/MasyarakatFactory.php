<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Masyarakat>
 */
class MasyarakatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'nik' => fake()->nik(),
            // 'telp' => fake()->phoneNumber(),
            // 'jk' => fake()->randomElement(['L','P']),
            // 'alamat' => fake()->address(),
            // 'user_id' => fake()->unique()->randomElement(['1','2','3','4','5']),

        ];
    }
}
