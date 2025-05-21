<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{


    public function submitForm(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($validated);

        return redirect()->route('admin.contact.index')->with('success', 'New contact message received.');
    }

    public function adminIndex()
    {
        $messages = ContactMessage::latest()->paginate(10);
        return view('admin.pages.contactUs.index', compact('messages'));
    }
}
