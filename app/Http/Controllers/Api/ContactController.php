<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contact;

class ContactController extends Controller
{
    //

    // Lấy danh sách contacts
    public function getContact()
    {
        $contacts = Contact::select('id', 'name', 'email', 'phone')->get();

        return response()->json([
            'success' => true,
            'data' => $contacts
        ], 200);
    }

    // Thêm contact mới
    public function sendContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'required|string|max:20'
        ]);

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Contact created successfully',
            'data' => $contact
        ], 201);
    }
}
