<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function enquiryList(){
        return view('enquiry.enquiry-list');
    }
}
