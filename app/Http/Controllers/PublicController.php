<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

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

        return view('index', compact('slider', 'featured','recently', 'trends', 'bestRated', 'hotNew', 'product_cat','midSliders','brands'));

    }
}
