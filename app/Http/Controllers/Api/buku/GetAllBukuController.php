<?php

namespace App\Http\Controllers\Api\buku;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Http\Resources\BukuResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GetAllBukuController extends Controller
{
    public function __invoke()
    {
        $data = Buku::latest()->paginate(10);
        if ($data->isEmpty()) {
            throw new ModelNotFoundException();
        }
        return new BukuResource(true, 'List of Bukus', $data);
    }
}
