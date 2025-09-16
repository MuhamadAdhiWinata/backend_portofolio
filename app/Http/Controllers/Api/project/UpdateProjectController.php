<?php

namespace App\Http\Controllers\Api\project;

use App\Helpers\ValidationHelper;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Resources\ProjectResource;
use Illuminate\Http\Request;

class UpdateProjectController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $validated = $request->validate(
            ValidationHelper::updateRulesFromModel(Project::class)
        );

        $item = Project::findOrFail($id);

        $item->update($validated);

        return new ProjectResource(true, 'Project updated successfully', $item);
    }
}
