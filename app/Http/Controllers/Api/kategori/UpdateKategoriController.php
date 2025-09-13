<?php

namespace App\Http\Controllers\Api\kategori;

use App\Helpers\ValidationHelper;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Http\Resources\KategoriResource;
use Illuminate\Http\Request;

class UpdateKategoriController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $validated = $request->validate(
            ValidationHelper::updateRulesFromModel(Kategori::class)
        );

        $item = Kategori::findOrFail($id);

        $item->update($validated);

        return new KategoriResource(true, 'Kategori updated successfully', $item);
    }
}
