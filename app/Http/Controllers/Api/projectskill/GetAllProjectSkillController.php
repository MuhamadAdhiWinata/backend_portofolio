<?php

namespace App\Http\Controllers\Api\projectskill;

use App\Http\Controllers\Controller;
use App\Models\ProjectSkill;
use App\Http\Resources\ProjectSkillResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GetAllProjectSkillController extends Controller
{
    public function __invoke()
    {
        $data = ProjectSkill::latest()->paginate(10);
        if ($data->isEmpty()) {
            throw new ModelNotFoundException();
        }
        return new ProjectSkillResource(true, 'List of ProjectSkills', $data);
    }
}
