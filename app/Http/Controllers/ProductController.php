<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function addProduct()
    {
        return view('product.add-product');
    }

    public function insertProduct(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'product_title' => 'required|string|max:255',
            'category' => 'required|string',
            'pro_short_des' => 'required|string',
            'pro_imageMulti.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pro_video' => 'mimetypes:video/mp4,video/x-m4v,video/*|max:20000',
            'meta_keyword' => 'required|string|max:255',
            'meta_description' => 'required|string|max:500',
            'meta_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_size' => 'required|digits_between:1,10',
            'product_price' => 'required|numeric|min:0',
            'modal_id' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $product = new ProductModel();
            $product->product_title = $request->product_title;
            $product->product_category = $request->category;
            $product->pro_short_des = $request->pro_short_des;
            $product->pro_description = $request->pro_description;
            $product->meta_keyword = $request->meta_keyword;
            $product->meta_description = $request->meta_description;
            $product->product_size = $request->product_size;
            $product->product_price = $request->product_price;
            $product->modal_id = $request->modal_id;
            $product->del_action = 'Active';

            if ($request->hasFile('meta_image')) {
                $metaImage = $request->file('meta_image');
                $metaImageName = time() . '_' . uniqid() . '.' . $metaImage->getClientOriginalExtension();
                $metaImage->move(public_path('storage/ProductImages'), $metaImageName);
                $product->meta_image = $metaImageName;
            }

            if ($request->hasFile('pro_video')) {
                $video = $request->file('pro_video');
                $videoName = time() . '_' . uniqid() . '.' . $video->getClientOriginalExtension();
                $video->move(public_path('storage/ProductImages'), $videoName);
                $product->pro_video = $videoName;
            }

            $product->save();

            if ($request->hasFile('pro_imageMulti')) {
                foreach ($request->file('pro_imageMulti') as $image) {
                    $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('storage/ProductImages'), $imageName);

                    DB::table('product_image')->insert([
                        'ref_id' => $product->product_id,
                        'product_img' => $imageName,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            return redirect()->route('product-list')->with('success', 'Product and images saved successfully!');
        }
    }
}
