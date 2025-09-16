<?php

namespace App\Http\Controllers\Api\skill;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Http\Resources\SkillResource;
use Illuminate\Support\Facades\Storage;

class DeleteSkillController extends Controller
{
    public function __invoke($id)
    {
        $item = Skill::findOrFail($id);
        Storage::delete('skills/' . basename($item->image));
        $item->delete();

        return new SkillResource(true, 'Skill deleted successfully', null);
    }
}
