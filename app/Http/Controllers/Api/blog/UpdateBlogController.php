<?php

namespace App\Http\Controllers\Api\blog;

use App\Helpers\ValidationHelper;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Http\Resources\BlogResource;
use Illuminate\Http\Request;

class UpdateBlogController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $validated = $request->validate(
            ValidationHelper::updateRulesFromModel(Blog::class)
        );

        $item = Blog::findOrFail($id);

        $item->update($validated);

        return new BlogResource(true, 'Blog updated successfully', $item);
    }
}
