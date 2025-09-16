<?php

namespace App\Http\Controllers\Api\testinmonial;

use App\Http\Controllers\Controller;
use App\Models\Testinmonial;
use App\Http\Resources\TestinmonialResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GetAllTestinmonialController extends Controller
{
    public function __invoke()
    {
        $data = Testinmonial::latest()->paginate(10);
        if ($data->isEmpty()) {
            throw new ModelNotFoundException();
        }
        return new TestinmonialResource(true, 'List of Testinmonials', $data);
    }
}
