<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Yoeunes\Toastr\Facades\Toastr;
use function GuzzleHttp\Promise\queue;
use function Sodium\add;

class CartController extends Controller
{

    public function AddtoCart($id){

        $product = Product::where('id', $id)->first();

        // Multiple size for One Size
        $product_size = $product->product_size;
        $size = explode(',', $product_size);

        // Multiple color for One Size
        $product_color = $product->product_color;
        $color = explode(',', $product_color);

        if ($product->discount_price == NULL){

            Cart::add([
                'id'        => $product->id,
                'name'      => $product->product_name,
                'qty'       => 1,
                'price'     => $product->selling_prize,
                'weight'    =>1,
                'options'   => [
                    'image' => $product->image_one,
                    'color' => $color[0],
                    'size'  => $size[0]
                ]
            ]);

            return response()->json([
                'success' => 'Added on your cart.'
            ]);

        }else{

            Cart::add([
                'id'        => $product->id,
                'name'      => $product->product_name,
                'qty'       => 1,
                'price'     => $product->discount_price,
                'weight'    =>1,
                'options'   => [
                    'image'  => $product->image_one,
                    'color' => $color[0],
                    'size'  => $size[0]
                ]
            ]);

            return response()->json([
               'success' => 'Successfully added on your cart.'
            ]);

        }

    }


    public function addCartSigleProductPage(Request $request, $id){

        $product = Product::where('id', $id)->first();

        if ($product->discount_price == NULL){
            Cart::add([
                'id'      => $product->id,
                'name'    => $product->product_name,
                'qty'     => $request->qty,
                'price'   => $product->selling_prize,
                'weight'  => 1,
                'options' => [
                    'image' => $product->image_one,
                    'color' => $request->color,
                    'size'  => $request->size
                ]
            ]);

            Toastr::success('Successfully added on your cart.');
            return redirect()->back();

        }else{

            Cart::add([
                'id'     => $product->id,
                'name'   => $product->product_name,
                'qty'    => $request->qty,
                'price'  => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->image_one,
                    'color' => $request->color,
                    'size'  => $request->size
                ]
            ]);

            Toastr::success('Successfully added on your cart.');
            return redirect()->back();
        }

    }

    public function countCart(){

        $count = Cart::count();
        return response()->json($count);

    }

    public function showCart(){
        $carts = Cart::content();

        return view('pages.cart',  compact('carts'));

    }

    public function UpdateCart(Request $request){
        $rowId = $request->productId;
        $qty = $request->qty;
        Cart::update($rowId,$qty);

        Toastr::success('Successfully updated quantity');
        return redirect()->back();
    }


    public function removeCart($id){

        Cart::remove($id);

        Toastr::success('Removed an item from your Cart');
        return redirect()->back();

    }

    public function ViewCartProduct($id){
        $product = Product::with('category', 'subcategory', 'brand')->where('id', $id)->first();
        $color = $product->product_color;
        $product_color = explode(',', $color);
        $size = $product->product_size;
        $product_size = explode(',', $size);

        return response::json([
           'product' => $product,
            'color'  => $product_color,
            'size'   => $product_size
        ]);

    }

    public function addCartInsertProduct(Request $request){
        $id = $request->product_id;
        $color = $request->color;
        $size   = $request->size;
        $product = Product::where('id', $id)->first();

        if ($product->discount_price == NULL){
            Cart::add([
                'id'        => $request->product_id,
                'name'      => $product->product_name,
                'price'     => $product->selling_prize,
                'qty'       => $request->qty,
                'weight'    => 1,
                'options'   => [
                    'image' => $product->image_one,
                    'color' => $request->color,
                    'size'  => $request->size,
                ]
            ]);

            Toastr::success('Successfully added on your Cart');
            return redirect()->back();


        }else{
            Cart::add([
                'id'        => $request->product_id,
                'name'      => $product->product_name,
                'price'     => $product->discount_price,
                'qty'       => $request->qty,
                'weight'    => 1,
                'options'   => [
                    'image' => $product->image_one,
                    'color' => $request->color,
                    'size'  => $request->size
                ]
            ]);
            Toastr::success('Successfully added on your Cart');
            return redirect()->back();
        }

    }

    public function checkOut(){
        if (Auth::check()){
            $carts = Cart::content();
            return view('pages.checkout', compact('carts'));
        }else{
            Toastr::warning('Please at first login your account');
            return redirect()->route('login');
        }
    }

    /// checking for testing
    public function checkCart(){
        $check = Cart::content();
//
////        return $check;
//        $product = Product::findOrFail(8);
//        $product_size =$product->product_size;
//
//        $size = explode(',', $product_size);

        return $check;

    }


}
