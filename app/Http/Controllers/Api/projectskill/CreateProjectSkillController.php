<?php

namespace App\Http\Controllers\Api\projectskill;

use App\Http\Controllers\Controller;
use App\Models\ProjectSkill;
use App\Http\Resources\ProjectSkillResource;
use Illuminate\Http\Request;
use App\Helpers\ValidationHelper;

class CreateProjectSkillController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate(
            ValidationHelper::rulesFromModel(ProjectSkill::class)
        );

        $data = ProjectSkill::create($validated);

        return new ProjectSkillResource(true, 'ProjectSkill created successfully', $data);
    }
}
