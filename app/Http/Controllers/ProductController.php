<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function productDetail($id, $product_name){
        $product = Product::where('id', $id)->where('product_name', $product_name)->first();

        // Product Color made as array
        $color = $product->product_color;
        $product_color= explode(',', $color);

        // Product Size made as array
        $size  = $product->product_size;
        $product_size = explode(',', $size);

        return view('pages.product-details', compact('product', 'product_color','product_size'));

    }

}
