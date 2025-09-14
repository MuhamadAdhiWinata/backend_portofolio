<?php

namespace App\Http\Controllers\Api\contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Http\Resources\ContactResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GetAllContactController extends Controller
{
    public function __invoke()
    {
        $data = Contact::latest()->paginate(10);
        if ($data->isEmpty()) {
            throw new ModelNotFoundException();
        }
        return new ContactResource(true, 'List of Contacts', $data);
    }
}
