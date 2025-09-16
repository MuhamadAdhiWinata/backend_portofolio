<?php

namespace App\Http\Controllers\Api\projectskill;

use App\Helpers\ValidationHelper;
use App\Http\Controllers\Controller;
use App\Models\ProjectSkill;
use App\Http\Resources\ProjectSkillResource;
use Illuminate\Http\Request;

class UpdateProjectSkillController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $validated = $request->validate(
            ValidationHelper::updateRulesFromModel(ProjectSkill::class)
        );

        $item = ProjectSkill::findOrFail($id);

        $item->update($validated);

        return new ProjectSkillResource(true, 'ProjectSkill updated successfully', $item);
    }
}
