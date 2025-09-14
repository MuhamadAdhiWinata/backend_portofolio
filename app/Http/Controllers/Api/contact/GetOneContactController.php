<?php

namespace App\Http\Controllers\Api\contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Http\Resources\ContactResource;

class GetOneContactController extends Controller
{
    public function __invoke($id)
    {
        $data = Contact::findOrFail($id);

        return new ContactResource(true, 'Contact fetched successfully', $data);
    }
}
