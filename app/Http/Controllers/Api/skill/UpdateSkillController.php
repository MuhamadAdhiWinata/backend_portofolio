<?php

namespace App\Http\Controllers\Api\skill;

use App\Helpers\ValidationHelper;
use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Http\Resources\SkillResource;
use Illuminate\Http\Request;

class UpdateSkillController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $validated = $request->validate(
            ValidationHelper::updateRulesFromModel(Skill::class)
        );

        $item = Skill::findOrFail($id);

        $item->update($validated);

        return new SkillResource(true, 'Skill updated successfully', $item);
    }
}
