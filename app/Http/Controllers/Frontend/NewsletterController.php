<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Newsletter;
use App\Product;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class NewsletterController extends Controller
{

    public function Store(Request $request){
//        $this->validate($request, [
//            'email' => 'required|unique:newsletters'
//        ]);

        $Exist = Newsletter::where('email', $request->email)->first();

        if (!$Exist){
        $subscriber = new Newsletter;
        $subscriber->email = $request->email;
        $subscriber->save();

        Toastr::success('Thanks for subscribing.');
        return redirect()->back();

        }else{
            Toastr::warning('You are already Subscribed!');
            return redirect()->back();
        }
    }

    public function categories(){
        $category = Category::skip(0)->first();
        $products = Product::where('category_id', $category->id)->where('status', 1)->get();
        return response()->json($products);
    }

}
