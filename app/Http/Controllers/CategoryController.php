<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

// category add view get controller
    function addCategoryView()
    {
        $categories = Category::simplePaginate(5);
        return view('category/view', compact('categories'));
    }

// category add post controller
    function addCategoryInsert(Request $request)
    {
        $request->validate([
            'postCategory' => 'required|unique:categories,post_category'
        ]);
        if (isset($request->menuStatus)) {
            Category::insert([
                'post_Category' => $request->postCategory,
                'menu_status' => true,
                'created_at' => Carbon::now(),
            ]);
        } else {
            Category::insert([
                'post_Category' => $request->postCategory,
                'menu_status' => false,
                'created_at' => Carbon::now(),
            ]);
        }

        return back()->with('status', 'Category added Successfully!');
    }

// category delete post controller
    function deleteCategory($categoryId)
    {

        if (count(Post::where('category_id',$categoryId)->get()) > 0) {
            return back()->with('delete_status', 'First You Need To Delete All post of This Category!');
        }



        elseif(Category::find($categoryId) == true) {
            Category::find($categoryId)->delete();
            return back()->with('delete_status', 'Category Deleted Successfully!');
        }
        else{
            return redirect('/');
        }

    }
// category changeStatus post controller
    function changeMenuStatus($categoryId)
    {

        if(Category::find($categoryId) == true){
            if (Category::find($categoryId)->menu_status == 0) {
                Category::find($categoryId)->update([
                    'menu_status' => true
                ]);
                return back();
            } else {
                Category::find($categoryId)->update([
                    'menu_status' => false
                ]);
                return back();
            }
        }
        else {
            return redirect('/');
        }
    }
}
