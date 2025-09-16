<?php

namespace App\Http\Controllers\Api\project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Resources\ProjectResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GetAllProjectController extends Controller
{
    public function __invoke()
    {
        $data = Project::latest()->paginate(10);
        if ($data->isEmpty()) {
            throw new ModelNotFoundException();
        }
        return new ProjectResource(true, 'List of Projects', $data);
    }
}
