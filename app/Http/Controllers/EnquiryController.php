<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function enquiryList(){
        return view('enquiry.enquiry-list');
    }

    public function SendEnquery(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|digits_between:10,15',
            'message' => 'required|string|max:500',
        ]);

        // Here you would typically save the enquiry to the database
        // For now, we will just return a success message

        return back()->with('success', 'Enquiry sent successfully!');
    }
}
