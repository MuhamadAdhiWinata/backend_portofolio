<?php

namespace App\Http\Controllers\Api\kategori;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Http\Resources\KategoriResource;
use Illuminate\Support\Facades\Storage;

class DeleteKategoriController extends Controller
{
    public function __invoke($id)
    {
        $item = Kategori::findOrFail($id);
        Storage::delete('kategoris/' . basename($item->image));
        $item->delete();

        return new KategoriResource(true, 'Kategori deleted successfully', null);
    }
}
