<?php

namespace App\Http\Controllers\Api\project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Resources\ProjectResource;
use Illuminate\Support\Facades\Storage;

class DeleteProjectController extends Controller
{
    public function __invoke($id)
    {
        $item = Project::findOrFail($id);
        Storage::delete('projects/' . basename($item->image));
        $item->delete();

        return new ProjectResource(true, 'Project deleted successfully', null);
    }
}
