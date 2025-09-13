<?php

namespace App\Http\Controllers\Api\kategori;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Http\Resources\KategoriResource;
use Illuminate\Http\Request;
use App\Helpers\ValidationHelper;

class CreateKategoriController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate(
            ValidationHelper::rulesFromModel(Kategori::class)
        );

        $data = Kategori::create($validated);

        return new KategoriResource(true, 'Kategori created successfully', $data);
    }
}
