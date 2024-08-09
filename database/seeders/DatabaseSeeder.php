<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\User;
use Database\Factories\BukuFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => 'user123'
        ]);
        User::factory()->create([
            'role' => 'admin',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin123'
        ]);

        Buku::factory()->count(10)->create();

        // Kategori::factory()->count(4)->create();
        Kategori::create(['nama' => 'Uncategorized']);
        Kategori::create(['nama' => 'Majalah']);
        Kategori::create(['nama' => 'Biografi']);
        Kategori::create(['nama' => 'Ensiklopedia']);
        Kategori::create(['nama' => 'Komik']);
        Kategori::create(['nama' => 'Manga']);
    }
}
