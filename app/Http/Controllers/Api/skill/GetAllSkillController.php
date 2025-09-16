<?php

namespace App\Http\Controllers\Api\skill;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Http\Resources\SkillResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GetAllSkillController extends Controller
{
    public function __invoke()
    {
        $data = Skill::latest()->paginate(10);
        if ($data->isEmpty()) {
            throw new ModelNotFoundException();
        }
        return new SkillResource(true, 'List of Skills', $data);
    }
}
