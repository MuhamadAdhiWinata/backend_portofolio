<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed kategori dan buku
        $this->call(\Database\Seeders\BukuKategoriSeeder::class);
    }
}
