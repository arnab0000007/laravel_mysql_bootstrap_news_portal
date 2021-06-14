<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuestPost;
use App\Models\Post;
use App\Models\Category;
use Carbon\Carbon;
use Image;

class GuestPostController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    function guestPostView()
    {

    $posts = GuestPost::latest()->simplePaginate(2);

        return view('guestPost/view',compact('posts'));
    }

     function guestPostEditView($postId)
    {

        $singlePostInfo = GuestPost::findOrFail($postId);
        $categories = Category::all();
        return view('guestPost/edit',compact('singlePostInfo','categories'));
    }
    function addGuestPostInsertMove(Request $request)
    {

        $request->validate([
            'postTitle' => 'required',
            'postDescription' => 'required',
            'postCategory' => 'required',
            'authorName' => 'required',
        ]);

        $post = GuestPost::find($request->postId);

        $lastInsertedId =  Post::insertGetId([
            'post_title' => $request->postTitle,
            'author_name' => $request->authorName,
            'category_id' => $request->postCategory,
            'post_description' => $request->postDescription,
            'created_at' => Carbon::now(),
        ]);

        if($request->hasFile('postImage')){

            if (GuestPost::find($request->postId)->post_image == 'defaultPostImage.jpg') {
                $imageToUpload = $request->postImage;
                $fileName = $lastInsertedId . '.' . $imageToUpload->getClientOriginalExtension();
                Image::make($imageToUpload)->resize(550, 400)->save(base_path('public/uploads/postImages/') . $fileName);
                Post::find($lastInsertedId)->update([
                    'post_image' => $fileName
                ]);
                GuestPost::find($request->postId)->delete();
            } else {

                $deleteFile = GuestPost::find($request->postId)->post_image;
                unlink(base_path('public/uploads/guestPostImages/' . $deleteFile));
                GuestPost::find($request->postId)->delete();
                $imageToUpload = $request->file('postImage');
                $fileName = $lastInsertedId . '.' . $imageToUpload->getClientOriginalExtension();
                Image::make($imageToUpload)->resize(550, 400)->save(base_path('public/uploads/postImages/') . $fileName);
                Post::find($lastInsertedId)->update([
                    'post_image' => $fileName
                ]);
            }
            return redirect('guest/post/view')->with('status', 'Post added Successfully!');
        }


         else {

            if ($post->post_image) {

                $imageToUpload = base_path('public/uploads/guestPostImages/' . $post->post_image);
                $infoPath = pathinfo(base_path('public/uploads/guestPostImages/' . $post->post_image));
                $exten = $infoPath['extension'];
                $fileName = $lastInsertedId . '.' . $exten;
                Image::make($imageToUpload)->resize(550, 400)->save(base_path('public/uploads/postImages/') . $fileName);
                Post::find($lastInsertedId)->update([
                    'post_image' => $fileName
                ]);
            }

            if (GuestPost::find($request->postId)->post_image == 'defaultPostImage.jpg') {
                GuestPost::find($request->postId)->delete();
                return redirect('guest/post/view')->with('status', 'Post added Successfully!');
            } else {
                $deleteFile = GuestPost::find($request->postId)->post_image;
                unlink(base_path('public/uploads/guestPostImages/' . $deleteFile));
                GuestPost::find($request->postId)->delete();
                return redirect('guest/post/view')->with('status', 'Post added Successfully!');
            }
        }
    }
}
