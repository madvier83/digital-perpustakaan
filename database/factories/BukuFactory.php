<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 2),
            'judul' => $this->faker->sentence(3),
            'kategori_id' => $this->faker->numberBetween(1, 5),
            'deskripsi' => $this->faker->paragraph(),
            'jumlah' => $this->faker->numberBetween(1, 100),
            'file' => $this->faker->fileExtension(),
            'cover' => 'covers/eKhY1kYJN1QRRUYM1UkTN4GhvI2w99Beie4NtPvo.png',
        ];
    }
}
