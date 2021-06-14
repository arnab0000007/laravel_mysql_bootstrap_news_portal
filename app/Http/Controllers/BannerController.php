<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Carbon\Carbon;
use Image;

class BannerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

 // banner view  get controller
    function addBannerView()
    {
        $banners = Banner::all();
        return view('banner/view',compact('banners'));
    }

 // banner add  post controller
    function addBannerInsert(Request $request)
    {
        $request->validate([
            'bannerImage' => 'required',
        ]);

        $lastInsertedId =  Banner::insertGetId([

            'created_at' => Carbon::now(),
        ]);
        if ($request->hasFile('bannerImage')) {
            $imageToUpload = $request->bannerImage;
            $fileName = $lastInsertedId . '.' . $imageToUpload->getClientOriginalExtension();
            Image::make($imageToUpload)->resize(600, 300)->save(base_path('public/uploads/bannerImages/') . $fileName);
            Banner::find($lastInsertedId)->update([
                'banner_image' => $fileName
            ]);
        }
        return back()->with('status', 'banner uploaded Successfully!');
    }

// banner delete  post controller
    function deleteBanner($bannerId)
    {

        if(Banner::find($bannerId) == true){
            $deleteFile = Banner::find($bannerId)->banner_image;
            unlink(base_path('public/uploads/BannerImages/' . $deleteFile));
            Banner::findOrFail($bannerId)->delete();
            return back()->with('delete_status', 'Banner Deleted Successfully!');
        }
        else{
            return redirect('/');
        }


    }
}
