<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function blogList()
    {
        $blogData = BlogModel::orderBy('blog_id', 'desc')->where('status', '1')->paginate(10);
        return view('blog.blog-list', compact('blogData'));
    }

    public function addBlog()
    {
        return view('blog.add-blog');
    }

    public function InsertBlog(Request $request)
    {
        $blogModel = new BlogModel();
        $validate = Validator::make($request->all(), [
            'meta_title' => 'required|string|max:255',
            'meta_keyword' => 'required|string|max:255',
            'meta_description' => 'required|string',
            'meta_image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'page_description' => 'required|string',
        ]);

        if ($validate->passes()) {
            // echo "abhishek";
            $imageName = null;
            if ($request->hasFile('meta_image')) {
                $image = $request->file('meta_image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                // $image->move(public_path('asset/images/BlogImages'), $imageName);
                $image->move(public_path('storage/BlogImages'), $imageName);
                $blogModel->blog_photo = $imageName;
            }
            $blogModel->meta_title = $request->meta_title;
            $blogModel->slug = generateUniqueSlug(BlogModel::class, $request->meta_title);
            $blogModel->meta_keyword = $request->meta_keyword;
            $blogModel->meta_description = $request->meta_description;
            $blogModel->blog_photo = $imageName;
            $blogModel->page_description = $request->page_description;

            if ($blogModel->save()) {
                return redirect()->route('blog-list')->with('success', 'Blog posted successfully!');
            } else {
                return redirect()->back()->with('error', 'Blog not posted!');
            }
        } else {
            return back()->withErrors($validate)->withInput();
        }
    }

    public function BlogShow($slug)
    {
        $data = BlogModel::where('slug', $slug)->first();
        $otherblog = BlogModel::where('slug', '!=', $slug)->orderBy('created_at', 'desc')->limit(4)->get();
        return view('blog.view-blog', ['blogdata' => $data, 'otherblogs' => $otherblog]);
    }

    public function UpdateBlog($slug)
    {
        $data = BlogModel::where('slug', $slug)->first();
        return view('blog.edit-blog', ['blogdata' => $data]);
    }

    public function updateBlogsData(Request $request, $id)
    {

        $validate = Validator::make($request->all(), [
            'meta_title' => 'required|string|max:255',
            'meta_keyword' => 'required|string|max:255',
            'meta_description' => 'required|string',
            'meta_image' => 'image|mimes:jpeg,png,jpg,gif',
            'page_description' => 'required|string',
        ]);

        if ($validate->passes()) {
            $imageName = $request->old_image;
            if ($request->hasFile('meta_image')) {
                $image = $request->file('meta_image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                // $image->move(public_path('asset/images/BlogImages'), $imageName);
                 $image->move(public_path('storage/BlogImages'), $imageName);

            }

            $data = [
                'meta_title' => $request->meta_title,
                'slug' => generateUniqueSlug(BlogModel::class, $request->meta_title),
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'blog_photo' => $imageName,
                'page_description' => $request->page_description
            ];

            if (BlogModel::where('blog_id', $id)->update($data)) {
                return redirect()->route('blog-list')->with('success', 'Blog updated successfully!');
            } else {
                return redirect()->back()->with('error', 'Blog not updated!');
            }
        } else {
            return back()->withErrors($validate)->withInput();
        }
    }

    public function DeleteBlog($id)
    {

        if (BlogModel::where('blog_id', $id)->update(['status' => '0'])) {
            return redirect()->route('blog-list')->with('success', 'Blog deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Blog not deleted!');
        }
    }
}
