<?php

namespace App\Http\Controllers\Api\profile;

use App\Helpers\ValidationHelper;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Http\Resources\ProfileResource;
use Illuminate\Http\Request;

class UpdateProfileController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $validated = $request->validate(
            ValidationHelper::updateRulesFromModel(Profile::class)
        );

        $item = Profile::findOrFail($id);

        $item->update($validated);

        return new ProfileResource(true, 'Profile updated successfully', $item);
    }
}
