<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){

        $slider     = Product::where(['main_slider' => 1, 'status' => 1])->orderBy('id', 'DESC')->first();
        $featured   = Product::where('status', 1)->take(10)->get();
        $trends     = Product::where('status', 1)->where('trend', 1)->take(8)->get();
        $bestRated  = Product::where('status', 1)->where('best_rated', 1)->take(8)->get();

        return view('index', compact('slider', 'featured', 'trends', 'bestRated'));

    }
}
