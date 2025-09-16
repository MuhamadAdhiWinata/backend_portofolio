<?php

namespace App\Http\Controllers\Api\testinmonial;

use App\Helpers\ValidationHelper;
use App\Http\Controllers\Controller;
use App\Models\Testinmonial;
use App\Http\Resources\TestinmonialResource;
use Illuminate\Http\Request;

class UpdateTestinmonialController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $validated = $request->validate(
            ValidationHelper::updateRulesFromModel(Testinmonial::class)
        );

        $item = Testinmonial::findOrFail($id);

        $item->update($validated);

        return new TestinmonialResource(true, 'Testinmonial updated successfully', $item);
    }
}
