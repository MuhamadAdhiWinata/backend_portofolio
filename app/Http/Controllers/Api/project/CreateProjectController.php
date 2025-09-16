<?php

namespace App\Http\Controllers\Api\project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Resources\ProjectResource;
use Illuminate\Http\Request;
use App\Helpers\ValidationHelper;

class CreateProjectController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate(
            ValidationHelper::rulesFromModel(Project::class)
        );

        $data = Project::create($validated);

        return new ProjectResource(true, 'Project created successfully', $data);
    }
}
