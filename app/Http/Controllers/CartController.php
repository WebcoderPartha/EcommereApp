<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
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
