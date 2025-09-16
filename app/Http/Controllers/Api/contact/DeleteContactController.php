<?php

namespace App\Http\Controllers\Api\contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Http\Resources\ContactResource;
use Illuminate\Support\Facades\Storage;

class DeleteContactController extends Controller
{
    public function __invoke($id)
    {
        $item = Contact::findOrFail($id);
        Storage::delete('contacts/' . basename($item->image));
        $item->delete();

        return new ContactResource(true, 'Contact deleted successfully', null);
    }
}
