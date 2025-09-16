<?php

namespace App\Http\Controllers\Api\testinmonial;

use App\Http\Controllers\Controller;
use App\Models\Testinmonial;
use App\Http\Resources\TestinmonialResource;

class GetOneTestinmonialController extends Controller
{
    public function __invoke($id)
    {
        $data = Testinmonial::findOrFail($id);

        return new TestinmonialResource(true, 'Testinmonial fetched successfully', $data);
    }
}
