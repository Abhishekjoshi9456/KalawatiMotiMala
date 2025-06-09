<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\BlogModel;

class HomeController extends Controller
{
    public function index()
    {
       $data = ProductModel::where('status', 1)->orderBy('product_id', 'desc')->get();
       $blogData = BlogModel::where('active_status', 1)->orderBy('blog_id', 'desc')->get();
        return view('frontend.home', ['products' => $data, 'blogs' => $blogData]);
    }
}
