<?php

namespace App\Http\Controllers\Api\buku;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Http\Resources\BukuResource;

class GetOneBukuController extends Controller
{
    public function __invoke($id)
    {
        $data = Buku::findOrFail($id);

        return new BukuResource(true, 'Buku fetched successfully', $data);
    }
}
