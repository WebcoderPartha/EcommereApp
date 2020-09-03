<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductStockController extends Controller
{

    public function productStockShow(){

        $products = Product::with(['category', 'brand', 'subcategory'])->orderBy('id', 'DESC')->get();
//        return response()->json($products);

        return view('admin.stock.product-stock', compact('products'));

    }

}
