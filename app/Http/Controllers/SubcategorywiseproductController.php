<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;

class SubcategorywiseproductController extends Controller
{

    public function SubcategoryProducts($id){

        $subcategory = SubCategory::findOrFail($id);
        $subcategories = Product::where('subcategory_id', $id)->where('status', 1)->orderBy('id', 'DESC')->paginate(10);
        $categories = Category::all();
        $brands = Product::with('brand')->where('subcategory_id', $id)->select('brand_id')->groupBy('brand_id')->get();

        return view('pages.subcategory-products', compact('subcategory', 'subcategories', 'categories', 'brands'));

    }

}
