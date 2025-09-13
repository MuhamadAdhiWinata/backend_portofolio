<?php

namespace App\Http\Controllers\Api\relations;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Http\Resources\relations\KategoriRelasiResource;

class KategoriBukuController extends Controller
{
    public function allKategori()
    {
        $data = Kategori::with('bukus')->latest()->paginate(10);

        return new KategoriRelasiResource(true, 'List Kategori dengan relasi Buku', $data);
    }
}
