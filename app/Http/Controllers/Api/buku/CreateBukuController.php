<?php

namespace App\Http\Controllers\Api\buku;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Http\Resources\BukuResource;
use Illuminate\Http\Request;
use App\Helpers\ValidationHelper;

class CreateBukuController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate(
            ValidationHelper::rulesFromModel(Buku::class)
        );

        $data = Buku::create($validated);

        return new BukuResource(true, 'Buku created successfully', $data);
    }
}
