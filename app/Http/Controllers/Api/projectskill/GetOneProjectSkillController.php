<?php

namespace App\Http\Controllers\Api\projectskill;

use App\Http\Controllers\Controller;
use App\Models\ProjectSkill;
use App\Http\Resources\ProjectSkillResource;

class GetOneProjectSkillController extends Controller
{
    public function __invoke($id)
    {
        $data = ProjectSkill::findOrFail($id);

        return new ProjectSkillResource(true, 'ProjectSkill fetched successfully', $data);
    }
}
