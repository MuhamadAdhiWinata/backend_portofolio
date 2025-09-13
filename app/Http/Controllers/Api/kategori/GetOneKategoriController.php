<?php

namespace App\Http\Controllers\Api\kategori;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Http\Resources\KategoriResource;

class GetOneKategoriController extends Controller
{
    public function __invoke($id)
    {
        $data = Kategori::findOrFail($id);

        return new KategoriResource(true, 'Kategori fetched successfully', $data);
    }
}
