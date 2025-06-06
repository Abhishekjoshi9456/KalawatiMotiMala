<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnquiryController extends Controller
{
    public function enquiryList()
    {
        return view('enquiry.enquiry-list');
    }

    public function SendEnquery(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number' => 'required|digits_between:10,15',
            'location' => 'required|string|max:255',
            'pincode' => 'required|digits:6',
            'quentity' => 'required|integer|min:1',
            'message' => 'required|string|max:1000',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        return  'Enquiry sent successfully!';
    }
}
