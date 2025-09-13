<?php

namespace App\Http\Controllers\Api\profile;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Http\Resources\ProfileResource;
use Illuminate\Support\Facades\Storage;

class DeleteProfileController extends Controller
{
    public function __invoke($id)
    {
        $item = Profile::findOrFail($id);
        Storage::delete('profiles/' . basename($item->image));
        $item->delete();

        return new ProfileResource(true, 'Profile deleted successfully', null);
    }
}
