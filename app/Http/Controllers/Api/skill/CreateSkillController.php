<?php

namespace App\Http\Controllers\Api\skill;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Http\Resources\SkillResource;
use Illuminate\Http\Request;
use App\Helpers\ValidationHelper;

class CreateSkillController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate(
            ValidationHelper::rulesFromModel(Skill::class)
        );

        $data = Skill::create($validated);

        return new SkillResource(true, 'Skill created successfully', $data);
    }
}
