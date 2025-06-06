<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\ProductImageModel;

class ProductController extends Controller
{
    public function productList()
    {
        $productData = ProductModel::where('del_action', 'Active')
            ->orderBy('product_id', 'desc')
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
            'thumbnail_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            $product->slug = generateUniqueSlug(ProductModel::class, $request->product_title);
            $product->pro_short_des = $request->pro_short_des;
            $product->pro_description = $request->pro_description;
            $product->meta_keyword = $request->meta_keyword;
            $product->meta_description = $request->meta_description;
            $product->product_size = $request->product_size;
            $product->product_price = $request->product_price;
            $product->modal_id = $request->modal_id;
            $product->thumbnail_img = $request->thumbnail_img;
            $product->del_action = 'Active';

            if($request->hasFile('thumbnail_img')) {
                $thumbnail = $request->file('thumbnail_img');
                $thumbnailName = time() . '_' . uniqid() . '.' . $thumbnail->getClientOriginalExtension();
                $thumbnail->move(public_path('storage/ProductImages'), $thumbnailName);
                $product->thumbnail_img = $thumbnailName;
            }

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
                        'ref_id' => $product->getKey(),
                        'product_img' => $imageName
                    ]);
                }
            }

            return redirect()->route('product-list')->with('success', 'Product and images saved successfully!');
        }
    }

    public function ProductShow($slug)
    {
        $data = ProductModel::where('slug', $slug)->first();
        // dd($data);
        $productImage = ProductImageModel::where([
            'ref_id' => $data->product_id,
            'status' => 'Active'
        ])->get();
        $productImages = $productImage->pluck('product_img')->toArray();
        return view('product.view-product', ['product' => $data, 'productImage' => $productImages]);
    }

    public function ProductEdit($slug)
    {
        $data = ProductModel::where('slug', $slug)->first();
        // dd($data);
        $productImage = ProductImageModel::where([
            'ref_id' => $data->product_id,
            'status' => 'Active'
        ])->get();
        $productImages = $productImage->pluck('product_img')->toArray();

        return view('product.edit-product', ['product' => $data, 'productImage' => $productImages]);
    }

    public function UpdateProduct(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'product_title' => 'required|string|max:255',
            'category' => 'required|string',
            'pro_short_des' => 'required|string',
            'pro_imageMulti.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20000',
            'pro_video' => 'mimetypes:video/mp4,video/x-m4v,video/*|max:20000',
            'meta_keyword' => 'required|string|max:255',
            'meta_description' => 'required|string|max:500',
            'meta_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_size' => 'required|digits_between:1,10',
            'product_price' => 'required|numeric|min:0',
            'modal_id' => 'required|string|max:100',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            $metaImageName = $request->meta_old_img;
            if ($request->hasFile('meta_image')) {
                $metaImage = $request->file('meta_image');
                $metaImageName = time() . '_' . uniqid() . '.' . $metaImage->getClientOriginalExtension();
                $metaImage->move(public_path('storage/ProductImages'), $metaImageName);
                // $product->meta_image = $metaImageName;
            }

            $videoName = $request->pro_video_old;
            if ($request->hasFile('pro_video')) {
                $video = $request->file('pro_video');
                $videoName = time() . '_' . uniqid() . '.' . $video->getClientOriginalExtension();
                $video->move(public_path('storage/ProductImages'), $videoName);
                // $product->pro_video = $videoName;
            }

            $data = [
                'product_title' => $request->product_title,
                'product_category' => $request->category,
                'slug' => generateUniqueSlug(ProductModel::class, $request->product_title),
                'pro_short_des' => $request->pro_short_des,
                'pro_description' => $request->pro_description,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'product_size' => $request->product_size,
                'product_price' => $request->product_price,
                'modal_id' => $request->modal_id,
                'del_action' => 'Active',
                'meta_image' => $metaImageName,
                'pro_video' => $videoName
            ];


            if (ProductModel::where('product_id', $id)->update($data)) {

                if ($request->has('proimageMulti')) {
                    DB::table('product_image')->where('ref_id', $id)->delete();

                    foreach ($request->proimageMulti as $oldImage) {
                        DB::table('product_image')->insert([
                            'ref_id' => $id,
                            'product_img' => $oldImage
                        ]);
                    }
                }

                if ($request->hasFile('pro_imageMulti')) {
                    foreach ($request->file('pro_imageMulti') as $image) {
                        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('storage/ProductImages'), $imageName);

                        DB::table('product_image')->insert([
                            'ref_id' => $id,
                            'product_img' => $imageName
                        ]);
                    }
                }
                return redirect()->route('product-list')->with('success', 'Product and images updated successfully!');
            } else {
                return redirect()->back()->with('error', 'Product not updated!');
            }
        }
    }

    public function ProductDelete($id)
    {
        $product = ProductModel::where('product_id', $id)->first();
        if ($product) {
            ProductModel::where('product_id', $id)->update(['del_action' => 'Inactive']);
            return redirect()->route('product-list')->with('success', 'Product deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Product not found!');
        }
    }
}
