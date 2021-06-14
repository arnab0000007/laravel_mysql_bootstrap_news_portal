<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Question;
use App\Models\Banner;
use App\Models\About;
use App\Models\GuestPost;
use Carbon\Carbon;
use Image;
class FrontendController extends Controller
{
    // welcome page get controller
    function index()
    {
        $categories = Category::all();
        $banners = Banner::all();
        $latestPost = Post::latest()->first();
        $isSingle = 0;
        $latestPost23 = Post::latest()->skip(1)->take(2)->get();
        $latestPost45 = Post::latest()->skip(3)->take(2)->get();
        $latestPost6 = Post::latest()->skip(5)->take(10)->get();
        $title = "Humanity";
        // dd($latestPost);
        return view('welcome', compact('categories','banners','latestPost','latestPost23','latestPost45','latestPost6','title','isSingle'));

    }

    function postDetails($postId)
    {
        $isSingle = 1;
        $post = Post::findOrFail($postId);
        $singlePostInfo = Post::findOrFail($postId);
        $recentPost = Post::latest()->take(5)->get();
        $latestPost6 = Post::latest()->skip(5)->take(10)->get();
        $categories = Category::all();
        $title = $singlePostInfo->post_title . ' | ' . 'Humanity';
        return view('frontEnd/postDetails', compact('postId','singlePostInfo','recentPost','latestPost6','categories','title','isSingle'));
    }
//category all post get controller
    function categoryPost($categoryId)
    {

        $isSingle = 0;
        $category = Category::findOrFail($categoryId);
        $latestPost = Post::where('category_id', $categoryId)->latest()->first();
        $latestPost23 = Post::where('category_id', $categoryId)->latest()->skip(1)->take(2)->get();
        $latestPost45 = Post::where('category_id', $categoryId)->latest()->skip(3)->take(2)->get();
        $posts = Post::where('category_id', $categoryId)->latest()->skip(5)->simplePaginate(5);
        $latestPost6 =  Post::latest()->skip(5)->take(10)->get();
        $title =$category->post_category . ' | ' . 'Humanity' ;
        return view('frontEnd/categoryPosts',
            compact('categoryId',
                    'latestPost',
                    'latestPost23',
                    'latestPost45',
                    'posts',
                    'category',
                    'latestPost6',
                    'title',
                    'isSingle')
                    );
    }

    function insertQuestionView()
    {
        $isSingle = 0;
        $title ='Ask Questions' . ' | ' . 'Humanity' ;
        return view('frontEnd/insertQuestionView',compact('title','isSingle'));
    }


    // answerView frontend get controller
    function answerView()
    {

    $isSingle = 0;
    $title = 'Question and Answers' . ' | ' . 'Humanity';

    $answerdQuestions = Question::where('answer_status',2)->latest()->paginate(10);
    return view('frontEnd/answerView',compact('answerdQuestions','title','isSingle'));

    }


    // About us view page get controller
    function aboutView()
    {
        $isSingle = 0;
        $title = 'About Us' . ' | ' . 'Humanity';
        $about = About::take(1)->first();
        return view('frontEnd/aboutView',compact('about','title','isSingle'));
    }

    function addGuestPostInsertView()
    {
        $isSingle = 0;
        $title = 'Submit Post' . ' | ' . 'Humanity';
        return view('frontEnd/guestPostInsertView',compact('title','isSingle'));
    }
    function questionInsert(Request $request)
    {

        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:50',
            'question_subject' => 'required|max:50',
            'question' => 'required|max:1000'
        ]);

        Question::insert([
            'name' => $request->name,
            'email' => $request->email,
            'question_subject' => $request->question_subject,
            'question' => $request->question,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('status', 'প্রশ্নটি সফলভাবে পাঠানো হয়েছে !');
    }
    function addGuestPostInsert(Request $request)
    {
        $request->validate([
            'postTitle' => 'required|max:200',
            'postDescription' => 'required|max:20000',
            'postCategory' => 'required',
            'authorName' => 'required|max:60',
        ]);

        $lastInsertedId =  GuestPost::insertGetId([
            'post_title' => $request->postTitle,
            'author_name' => $request->authorName,
            'category_id' => $request->postCategory,
            'post_description' => $request->postDescription,
            'created_at' => Carbon::now(),
        ]);
        if ($request->hasFile('postImage')) {
            $imageToUpload = $request->postImage;
            $fileName = $lastInsertedId . '.' . $imageToUpload->getClientOriginalExtension();
            Image::make($imageToUpload)->resize(550, 400)->save(base_path('public/uploads/guestPostImages/') . $fileName);
            GuestPost::find($lastInsertedId)->update([
                'post_image' => $fileName
            ]);
        }
        return back()->with('status', 'লেখাটি পাঠানো হয়েছে !');
    }
}
