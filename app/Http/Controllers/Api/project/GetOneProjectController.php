<?php

namespace App\Http\Controllers\Api\project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Resources\ProjectResource;

class GetOneProjectController extends Controller
{
    public function __invoke($id)
    {
        $data = Project::findOrFail($id);

        return new ProjectResource(true, 'Project fetched successfully', $data);
    }
}
