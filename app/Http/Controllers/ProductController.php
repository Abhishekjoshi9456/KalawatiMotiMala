<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productList()
    {
       $productData = ProductModel::where('products.del_action', 'Active')
            ->join('product_image', 'products.product_id', '=', 'product_image.ref_id')
            ->select('products.*', 'product_image.product_img as product_image')->orderBy('products.product_id', 'desc')
            ->paginate(10);
            
        return view('product.product-list', ['productData' => $productData]);
    }
}
