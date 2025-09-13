<?php

namespace App\Http\Controllers\Api\profile;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Http\Resources\ProfileResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GetAllProfileController extends Controller
{
    public function __invoke()
    {
        $data = Profile::latest()->paginate(10);
        if ($data->isEmpty()) {
            throw new ModelNotFoundException();
        }
        return new ProfileResource(true, 'List of Profiles', $data);
    }
}
