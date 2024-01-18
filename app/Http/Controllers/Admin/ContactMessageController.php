<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function contactMessages() {
        return view('admin.contactmessages.contactmessages', [
            'contactmessages' => ContactMessage::orderBy('id')
                    ->filter(request(['search']))
                    ->paginate(10)
                    ->withQueryString(),
        ]);
    }


    public function contactMessagesDestroy(ContactMessage $contactmessages) {
        $contactmessages->delete();
        return back()->with('success', 'Contact Message Deleted Successfully');
    }
}
