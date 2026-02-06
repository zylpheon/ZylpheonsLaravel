<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'interest' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:5000',
        ]);

        Contact::create($validated);

        return back()->with('success', 'Thank you for your message! We will contact you shortly.');
    }
}
