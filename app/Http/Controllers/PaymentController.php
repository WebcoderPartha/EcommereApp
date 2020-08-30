<?php

namespace App\Http\Controllers;

use App\Order;
use App\Orderdetail;
use App\Setting;
use App\Shipping;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Yoeunes\Toastr\Facades\Toastr;
use function GuzzleHttp\Promise\queue;

class PaymentController extends Controller
{
    public function paymentProccess(Request $request){

        $data             = [];
        $data['name']     = $request->name;
        $data['phone']    = $request->phone;
        $data['email']    = $request->email;
        $data['address']  = $request->address;
        $data['city']     = $request->city;
        $data['postcode'] = $request->postcode;
        $data['country']  = $request->country;
        $data['payment']  = $request->payment;

        if ($request->payment == 'Stripe'){
            $charge = Setting::first();
            $carts = Cart::content();
            return view('pages.payment.stripe', compact('data', 'carts', 'charge'));

        }elseif($request->payment == 'Paypal'){

            return 'Paypal';

        }else{

            return 'Cash on delivery';

        }

    }

    public function stripePayment(Request $request){

        $carts = Cart::content();
        $total = $request->total;

        // Set your secret key. Remember to switch to your live secret key in production!
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51Ca8nUDxkuq7ZYNICwkwgw6Ie8X6FTxGKBxlsPbkbMnMabvsH6VbL22KuDcRKnJCwVDOVjjrUp0Nekk1P7TgbkQf00KwE0fvFT');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = Charge::create([
            'amount' => $total*100, // * 100 means usd
            'currency' => 'usd',
            'description' => 'Ecommerce',
            'source' => $token,
            'metadata' => ['order_id' => hexdec(uniqid())],
            'billing_details' => [
                'name' => $request->customername
            ]
        ]);

        // Insert Order
        $order = new Order;
        $order->user_id = Auth::id();
        $order->payment_id = $charge->payment_method;
        $order->paying_amount = $charge->amount;
        $order->balance_transaction = $charge->balance_transaction;
        $order->payment_type = $request->payment_type;
        $order->order_id = $charge->metadata->order_id;
        $order->discount = $request->discount;
        $order->shipping_charge = $request->shipping_charge;
        $order->vat = $request->vat;
        $order->subtotal = $request->subtotal;
        $order->total = $request->total;
        $order->status = 0;
        $order->date = date('d-m-y');
        $order->month = date('F');
        $order->year = date('Y');
        $order->save();

        // Insert Shipping Details
        $shipping_details = new Shipping;
        $shipping_details->order_id = $order->id;
        $shipping_details->ship_name = $request->ship_name;
        $shipping_details->ship_phone = $request->ship_phone;
        $shipping_details->ship_email = $request->ship_email;
        $shipping_details->ship_address = $request->ship_address;
        $shipping_details->ship_city = $request->ship_city;
        $shipping_details->ship_zipecode = $request->ship_zipecode;
        $shipping_details->ship_country = $request->ship_country;
        $shipping_details->save();

        //Insert Order Details
        foreach ($carts as $cart) {

            $order_details = new Orderdetail;
            $order_details->order_id = $order->id;
            $order_details->product_id = $cart->id;
            $order_details->product_name = $cart->name;
            $order_details->color = $cart->options->color;
            $order_details->size = $cart->options->size;
            $order_details->qty = $cart->qty;
            $order_details->single_price = $cart->price;
            $order_details->total_price = $cart->price*$cart->qty;
            $order_details->save();

        }


        Cart::destroy();
        Session::forget('coupon');
        Toastr::success(' Order has been placed successfully');
        return redirect()->route('frontent.home');


    }

}
