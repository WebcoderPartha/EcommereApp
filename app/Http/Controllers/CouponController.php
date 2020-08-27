<?php

namespace App\Http\Controllers;

use App\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yoeunes\Toastr\Facades\Toastr;

class CouponController extends Controller
{

    public function appplyCouponCheckout(Request $request){

        $coupon = $request->coupon;
        $couponCheck = Coupon::where('coupon', $coupon)->first();


        if ($couponCheck){
            Session::put('coupon', [
                'name'     => $couponCheck->coupon,
                'discount' => $couponCheck->discount,
                'balance'  => Cart::subtotal() - $couponCheck->discount,
            ]);
            Toastr::success('Successfully Coupon Applied');
            return back();
        }else{
            Toastr::success('Invalid Coupon!');
            return back();
        }

    }

    public function removeCoupon(){

        Session::forget('coupon');
        Toastr::success('Coupon removed successfully');
        return redirect()->back();

    }


}
