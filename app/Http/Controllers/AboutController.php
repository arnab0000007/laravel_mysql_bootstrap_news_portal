<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Carbon\Carbon;

class AboutController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

// about insert view get controller
    function aboutInsertView()
    {
        $about = About::take(1)->first();

        if ($about === null) {
            return view('about/view', compact('about'));
        } else {
            return view('about/edit', compact('about'));
        }
    }
// about insert  post controller
    function addAboutInsert(Request $request)
    {
        $request->validate([
            'about' => 'required|max:3000',
            'ourWork'=> 'required|max:3000',
            'help'=> 'required|max:3000'
        ]);
        About::insert([
            'about' => $request->about,
            'our_work'=>$request->ourWork,
            'help'=>$request->help,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('status', 'about Us added Successfully!');
    }
// about edit  post controller
    function editAboutInsert(Request $request)
    {
        $request->validate([
            'about' => 'required|max:3000',
            'ourWork'=> 'required|max:3000',
            'help'=> 'required|max:3000'
        ]);

        About::find($request->id)->update([
            'about' => $request->about,
            'our_work'=>$request->ourWork,
            'help'=>$request->help,
            'updated_at' => Carbon::now(),
        ]);
        return back()->with('edit_status', 'About us Description Edited Successfully!');
    }
}
