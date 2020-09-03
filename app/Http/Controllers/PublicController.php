<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class PublicController extends Controller
{
    public function index(){

        $slider     = Product::where(['main_slider' => 1, 'status' => 1])->orderBy('id', 'DESC')->first();
        $featured   = Product::where('status', 1)->take(10)->get();
        $recently   = Product::where('status', 1)->take(10)->get();
        $trends     = Product::where('status', 1)->where('trend', 1)->take(8)->get();
        $bestRated  = Product::where('status', 1)->where('best_rated', 1)->take(8)->get();
        $hotNew     = Product::where('status', 1)->where('hot_deal', 1)->limit(3)->get();
        $midSliders = Product::where('status', 1)->where('mid_slider', 1)->limit(4)->get();
        $product_cat= Category::all();
        $brands     = Brand::all();

        $buyone_getone = Product::where('status', 1)->where('buyone_getone', 1)->orderBy('id', 'DESC')->get();

        /// Category wise produces

        // Skip for Specific category select
        $watch_category = Category::skip(3)->first();
        $catId = $watch_category->id;

        $man_category = Category::skip(0)->first();
        $mancatID = $man_category->id;

        $watch_products = Product::where('category_id', $catId)->where('status', 1)->orderBy('id', 'DESC')->take(10)->get();

        $man_products = Product::where('category_id', $mancatID)->where('status', 1)->orderBy('id', 'DESC')->take(10)->get();

        //Another way for Specific category select
//        $watch_products = Product::with('category')->where('category_id', 22)->where('status', 1)->get();
//        return response()->json($buyone_getone);

        return view('index', compact('slider', 'featured','recently', 'trends', 'bestRated', 'hotNew', 'product_cat','midSliders','brands', 'watch_products', 'watch_category', 'man_category', 'man_products', 'buyone_getone'));

    }

    public function orderTracking(Request $request){
        $order_id = $request->order_id;

        $track_order = Order::where('order_id', $order_id)->first();

        if ($track_order){
            return view('pages.tracking-order', compact('track_order'));
        }else{

            Toastr::warning('Invalid Order ID');
            return redirect()->back();

        }

    }

    public function searchProduct(Request $request){
        $categories = Category::all();
        $brands = Brand::all();

        $search = $request->search_product;

        $search_product = Product::where('product_name', 'LIKE', "%$search%")
            ->orWhere('product_color', 'LIKE', "%$search%")->paginate(20);

        return view('pages.search-product', compact('search_product', 'search', 'categories', 'brands'));

    }

}
