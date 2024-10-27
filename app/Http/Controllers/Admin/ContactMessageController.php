<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index() {
        return view('admin.contactmessages.index', [
            'contactmessages' => ContactMessage::orderBy('id')
                    ->filter(request(['search']))
                    // ->get(),
                    ->paginate(10)
                    ->withQueryString(),
        ]);
    }


    public function destroy(ContactMessage $contactmessage) {
        $contactmessage->delete();
        return back()->with('success', 'Contact Message Deleted Successfully');
    }
}
