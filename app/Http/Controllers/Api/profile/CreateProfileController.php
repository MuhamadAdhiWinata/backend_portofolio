<?php

namespace App\Http\Controllers\Api\profile;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Http\Resources\ProfileResource;
use Illuminate\Http\Request;
use App\Helpers\ValidationHelper;

class CreateProfileController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate(
            ValidationHelper::rulesFromModel(Profile::class)
        );

        $data = Profile::create($validated);

        return new ProfileResource(true, 'Profile created successfully', $data);
    }
}
