<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;
use Image;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //the function to show post
    function addPostView()
    {
        // $post = Post::all();
        $posts = Post::latest()->simplePaginate(10);
        $categories = Category::all();
        return view('post/view', compact('posts', 'categories'));
    }

    // //the function to add a post
    function addPostInsert(Request $request)
    {

        $request->validate([
            'postTitle' => 'required|max:200',
            'postDescription' => 'required|max:20000',
            'postCategory' => 'required',
            'authorName' => 'required|max:60',
        ]);

        $lastInsertedId =  Post::insertGetId([
            'post_title' => $request->postTitle,
            'author_name' => $request->authorName,
            'category_id' => $request->postCategory,
            'post_description' => $request->postDescription,
            'created_at' => Carbon::now(),
        ]);
        if ($request->hasFile('postImage')) {
            $imageToUpload = $request->postImage;
            $fileName = $lastInsertedId . '.' . $imageToUpload->getClientOriginalExtension();
            Image::make($imageToUpload)->resize(550, 400)->save(base_path('public/uploads/postImages/') . $fileName);
            Post::find($lastInsertedId)->update([
                'post_image' => $fileName
            ]);
        }
        else {

            Post::find($lastInsertedId)->update([
                'updated_at' => Carbon::now()
            ]);

        }
        return back()->with('status', 'Post added Successfully!');
    }
    //delete Post Post Controller
    function deletePost($postId)
    {
        if(Post::find($postId) == true){
            if (Post::find($postId)->post_image == 'defaultPostImage.jpg') {
                Post::find($postId)->delete();
                return back()->with('delete_status', 'Post Deleted Successfully!');
            } else {
                $deleteFile = Post::find($postId)->post_image;
                unlink(base_path('public/uploads/postImages/' . $deleteFile));
                Post::find($postId)->delete();
                return back()->with('delete_status', 'Post Deleted Successfully!');
            }
        }
        else {
            return redirect('/');
        }
    }

//edit post Get Controller

    function editPost($postId)
    {
        $singlePostInfo = Post::findOrFail($postId);
        $categories = Category::all();
        return view('post/edit', compact('singlePostInfo','categories'));
    }

    function editPostInsert(Request $request)
    {

        $request->validate([
            'postTitle' => 'required|max:200',
            'postDescription' => 'required|max:20000',
            'postCategory' => 'required',
            'authorName' => 'required|max:60',
        ]);
        if ($request->hasFile('postImage')) {

            if (Post::find($request->postId)->post_image == 'defaultPostImage.jpg') {
                $imageToUpload = $request->postImage;
                $fileName = $request->postId . '.' . $imageToUpload->getClientOriginalExtension();
                Image::make($imageToUpload)->resize(550, 400)->save(base_path('public/uploads/postImages/') . $fileName);
                Post::find($request->postId)->update([
                    'post_image' => $fileName
                ]);
            } else {

                $deleteFile = Post::find($request->postId)->post_image;
                unlink(base_path('public/uploads/postImages/' . $deleteFile));

                $imageToUpload = $request->file('postImage');
                $fileName = $request->postId . '.' . $imageToUpload->getClientOriginalExtension();
                Image::make($imageToUpload)->resize(550, 400)->save(base_path('public/uploads/postImages/') . $fileName);
                Post::find($request->postId)->update([
                    'post_image' => $fileName
                ]);
            }
        }
        Post::find($request->postId)->update([
            'post_title' => $request->postTitle,
            'author_name' => $request->authorName,
            'category_id' => $request->postCategory,
            'post_description' => $request->postDescription,
            'updated_at' => Carbon::now(),
        ]);
        return back()->with('edit_status', 'Post Edited Successfully!');
    }
}
