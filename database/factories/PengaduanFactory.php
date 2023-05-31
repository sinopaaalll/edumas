<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengaduan>
 */
class PengaduanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 3,
            'kategori_id' => 1,
            'lokasi' => fake()->address(),
            'deskripsi' => fake()->paragraph(),
            'image' => fake()->word().'.jpg',
            'status' => fake()->randomElement(['masuk','proses','selesai','ditolak'])
        ];
    }
}
