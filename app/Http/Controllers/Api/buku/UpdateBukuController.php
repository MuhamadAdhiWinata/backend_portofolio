<?php

namespace App\Http\Controllers\Api\buku;

use App\Helpers\ValidationHelper;
use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Http\Resources\BukuResource;
use Illuminate\Http\Request;

class UpdateBukuController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $validated = $request->validate(
            ValidationHelper::updateRulesFromModel(Buku::class)
        );

        $item = Buku::findOrFail($id);

        $item->update($validated);

        return new BukuResource(true, 'Buku updated successfully', $item);
    }
}
