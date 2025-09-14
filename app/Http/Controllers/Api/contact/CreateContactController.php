<?php

namespace App\Http\Controllers\Api\contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Http\Resources\ContactResource;
use Illuminate\Http\Request;
use App\Helpers\ValidationHelper;

class CreateContactController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate(
            ValidationHelper::rulesFromModel(Contact::class)
        );

        $data = Contact::create($validated);

        return new ContactResource(true, 'Contact created successfully', $data);
    }
}
