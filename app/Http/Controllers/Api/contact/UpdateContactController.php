<?php

namespace App\Http\Controllers\Api\contact;

use App\Helpers\ValidationHelper;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Http\Resources\ContactResource;
use Illuminate\Http\Request;

class UpdateContactController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $validated = $request->validate(
            ValidationHelper::updateRulesFromModel(Contact::class)
        );

        $item = Contact::findOrFail($id);

        $item->update($validated);

        return new ContactResource(true, 'Contact updated successfully', $item);
    }
}
