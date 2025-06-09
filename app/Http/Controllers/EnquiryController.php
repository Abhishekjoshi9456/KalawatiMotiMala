<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\EnquiryModel;

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
        }else{
            $enquiry = new EnquiryModel();
            $enquiry->product_id = $request->input('product_id');
            $enquiry->name = $request->input('name');
            $enquiry->email = $request->input('email');
            $enquiry->mobile = $request->input('number');
            $enquiry->location = $request->input('location');
            $enquiry->pincode = $request->input('pincode');
            $enquiry->quantity = $request->input('quentity');
            $enquiry->message = $request->input('message');

            if (!$enquiry->save()) {
                return response()->json(['error' => 'Failed to send enquiry. Please try again later.']);
            }else{
                return response()->json(['success' => 'Enquiry sent successfully!']);
            }
        }
    }
}
