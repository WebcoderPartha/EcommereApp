<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategorywiseproductController extends Controller
{
    public function CategoryProducts($id){

        $category = Category::findOrFail($id);
        $category_prooduct = Product::where('category_id', $id)->where('status', 1)->orderBy('id', 'desc')->paginate(10);
        $categories = Category::all();
        $brands = Product::with('brand')->where('category_id', $id)->select('brand_id')->groupBy('brand_id')->get();
        return view('pages.category-products', compact('category_prooduct', 'category', 'categories', 'brands'));


    }
}
