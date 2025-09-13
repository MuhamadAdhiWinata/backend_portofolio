<?php

namespace App\Http\Controllers\Api\blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Http\Resources\BlogResource;

class GetOneBlogController extends Controller
{
    public function __invoke($id)
    {
        $data = Blog::findOrFail($id);

        return new BlogResource(true, 'Blog fetched successfully', $data);
    }
}
