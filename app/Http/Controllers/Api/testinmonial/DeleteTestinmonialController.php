<?php

namespace App\Http\Controllers\Api\testinmonial;

use App\Http\Controllers\Controller;
use App\Models\Testinmonial;
use App\Http\Resources\TestinmonialResource;
use Illuminate\Support\Facades\Storage;

class DeleteTestinmonialController extends Controller
{
    public function __invoke($id)
    {
        $item = Testinmonial::findOrFail($id);
        Storage::delete('testinmonials/' . basename($item->image));
        $item->delete();

        return new TestinmonialResource(true, 'Testinmonial deleted successfully', null);
    }
}
