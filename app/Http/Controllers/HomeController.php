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

    public function ourProduct()
    {
        $data = ProductModel::where('status', 1)->orderBy('product_id', 'desc')->get();
        return view('frontend.our-product', ['products' => $data]);
    }

    public function blog()
    {
        $blogData = BlogModel::where('active_status', 1)->orderBy('blog_id', 'desc')->get();
        return view('frontend.our-blog', ['blogs' => $blogData]);
    }

    public function MotiMala()
    {
        $data = ProductModel::where(['status'=> 1, 'product_category'=>'Moti Mala'])->orderBy('product_id', 'desc')->get();
        return view('frontend.moti-mala', ['products' => $data]);
    }

    public function BhartiMotiMala()
    {
        $data = ProductModel::where(['status'=> 1, 'product_category'=>'Barati Moti Mala'])->orderBy('product_id', 'desc')->get();
        return view('frontend.barati-moti-mala', ['products' => $data]);
    }

    public function MalaForGuests()
    {
        $data = ProductModel::where(['status'=> 1, 'product_category'=>'Mala For Guests'])->orderBy('product_id', 'desc')->get();
        return view('frontend.mala-for-guests', ['products' => $data]);
    }
}
