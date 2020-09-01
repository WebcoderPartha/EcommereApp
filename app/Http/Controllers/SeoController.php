<?php

namespace App\Http\Controllers;

use App\Seo;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class SeoController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function seoSetting(){

        $seo = Seo::first();
        return view('admin.seo', compact('seo'));

    }

    public function seoUpdate(Request $request){

        $id = $request->id;

        Seo::where('id', $id)->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_tag' => $request->meta_tag,
            'meta_description' => $request->meta_description,
            'google_analytics' => $request->google_analytics,
            'bing_analytics' => $request->bing_analytics,

        ]);

        Toastr::success('Seo updated successfully');
        return redirect()->back();

    }

}
