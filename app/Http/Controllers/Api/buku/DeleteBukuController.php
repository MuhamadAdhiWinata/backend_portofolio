<?php

namespace App\Http\Controllers\Api\buku;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Http\Resources\BukuResource;
use Illuminate\Support\Facades\Storage;

class DeleteBukuController extends Controller
{
    public function __invoke($id)
    {
        $item = Buku::findOrFail($id);
        Storage::delete('bukus/' . basename($item->image));
        $item->delete();

        return new BukuResource(true, 'Buku deleted successfully', null);
    }
}
