<?php

namespace App\Http\Controllers\Api\projectskill;

use App\Http\Controllers\Controller;
use App\Models\ProjectSkill;
use App\Http\Resources\ProjectSkillResource;
use Illuminate\Support\Facades\Storage;

class DeleteProjectSkillController extends Controller
{
    public function __invoke($id)
    {
        $item = ProjectSkill::findOrFail($id);
        Storage::delete('projectskills/' . basename($item->image));
        $item->delete();

        return new ProjectSkillResource(true, 'ProjectSkill deleted successfully', null);
    }
}
