<?php

namespace App\Http\Controllers\Api\profile;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Http\Resources\ProfileResource;

class GetOneProfileController extends Controller
{
    public function __invoke($id)
    {
        $data = Profile::findOrFail($id);

        return new ProfileResource(true, 'Profile fetched successfully', $data);
    }
}
