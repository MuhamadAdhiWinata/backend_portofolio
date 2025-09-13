<?php

namespace App\Http\Controllers\Api\kategori;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Http\Resources\KategoriResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GetAllKategoriController extends Controller
{
    public function __invoke()
    {
        $data = Kategori::latest()->paginate(10);
        if ($data->isEmpty()) {
            throw new ModelNotFoundException();
        }
        return new KategoriResource(true, 'List of Kategoris', $data);
    }
}
