<?php

namespace App\Http\Controllers\Api\blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Http\Resources\BlogResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GetAllBlogController extends Controller
{
    public function __invoke()
    {
        $data = Blog::latest()->paginate(10);
        if ($data->isEmpty()) {
            throw new ModelNotFoundException();
        }
        return new BlogResource(true, 'List of Blogs', $data);
    }
}
