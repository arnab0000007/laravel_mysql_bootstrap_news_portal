<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Question;
use App\Models\Banner;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allUsers =  User::all();
        $totalPosts = count(Post::all());
        $totalCategry = count(Category::all());
        $totalQuestion = count(Question::all());
        $totalBanners = count(Banner::all());

        return view('home', compact('allUsers','totalPosts','totalCategry','totalQuestion','totalBanners'));
    }
}
