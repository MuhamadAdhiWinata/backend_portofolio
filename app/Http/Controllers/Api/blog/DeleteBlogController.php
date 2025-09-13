<?php

namespace App\Http\Controllers\Api\blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Http\Resources\BlogResource;
use Illuminate\Support\Facades\Storage;

class DeleteBlogController extends Controller
{
    public function __invoke($id)
    {
        $item = Blog::findOrFail($id);
        Storage::delete('blogs/' . basename($item->image));
        $item->delete();

        return new BlogResource(true, 'Blog deleted successfully', null);
    }
}
