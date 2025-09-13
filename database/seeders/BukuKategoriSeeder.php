<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;
use App\Models\Buku;

class BukuKategoriSeeder extends Seeder
{
    public function run()
    {
        // Buat beberapa kategori
        $kategoriTeknologi = Kategori::create(['nama' => 'Teknologi']);
        $kategoriSastra    = Kategori::create(['nama' => 'Sastra']);
        $kategoriBisnis    = Kategori::create(['nama' => 'Bisnis']);

        // Buat buku dan hubungkan ke kategori
        Buku::create([
            'nama' => 'Belajar Laravel',
            'penulis' => 'Adi Nugroho',
            'tahun' => 2025,
            'harga' => 120000,
            'kategori_id' => $kategoriTeknologi->id
        ]);

        Buku::create([
            'nama' => 'Laskar Pelangi',
            'penulis' => 'Andrea Hirata',
            'tahun' => 2005,
            'harga' => 90000,
            'kategori_id' => $kategoriSastra->id
        ]);

        Buku::create([
            'nama' => 'Business 101',
            'penulis' => 'John Doe',
            'tahun' => 2020,
            'harga' => 150000,
            'kategori_id' => $kategoriBisnis->id
        ]);

        // Bisa tambahkan lebih banyak data dummy sesuai kebutuhan
    }
}
