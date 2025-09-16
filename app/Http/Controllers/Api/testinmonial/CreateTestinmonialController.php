<?php

namespace App\Http\Controllers\Api\testinmonial;

use App\Http\Controllers\Controller;
use App\Models\Testinmonial;
use App\Http\Resources\TestinmonialResource;
use Illuminate\Http\Request;
use App\Helpers\ValidationHelper;

class CreateTestinmonialController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate(
            ValidationHelper::rulesFromModel(Testinmonial::class)
        );

        $data = Testinmonial::create($validated);

        return new TestinmonialResource(true, 'Testinmonial created successfully', $data);
    }
}
