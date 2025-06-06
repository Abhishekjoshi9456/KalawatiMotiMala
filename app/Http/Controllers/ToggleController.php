<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class ToggleController extends Controller
{
    public function BlogStatus(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');

        // return response()->json([
        //     'id' => $id,
        //     'status' => $status
        // ]);
        if (BlogModel::where('blog_id', $id)->update(['active_status' => $status])) {
            return "success";
        } else {
            return "error";
        }
    }

    public function productStatus(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        if (ProductModel::where('product_id', $id)->update(['status' => $status])) {
            return "success";
        } else {
            return "error";
        }
    }
}
