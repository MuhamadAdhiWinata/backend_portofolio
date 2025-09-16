<?php

namespace App\Http\Controllers\Api\skill;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Http\Resources\SkillResource;

class GetOneSkillController extends Controller
{
    public function __invoke($id)
    {
        $data = Skill::findOrFail($id);

        return new SkillResource(true, 'Skill fetched successfully', $data);
    }
}
