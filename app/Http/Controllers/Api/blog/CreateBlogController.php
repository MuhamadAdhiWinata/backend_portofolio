<?php

namespace App\Http\Controllers\Api\blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Http\Resources\BlogResource;
use Illuminate\Http\Request;
use App\Helpers\ValidationHelper;

class CreateBlogController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate(
            ValidationHelper::rulesFromModel(Blog::class)
        );

        $data = Blog::create($validated);

        return new BlogResource(true, 'Blog created successfully', $data);
    }
}
