<?php

namespace App\Http\Controllers;

use App\Order;
use App\Orderdetail;
use App\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yoeunes\Toastr\Facades\Toastr;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->orderBy('id', 'DESC')->limit(10)->get();

        return view('home', compact('orders'));
    }

    public function orderView($order_id){
        $orders = Order::where('order_id', $order_id)->first();
        $shippings = Shipping::where('order_id', $orders->id)->first();
        $order_details = Orderdetail::with('product')->where('order_id', $orders->id)->get();
        return view('pages.user-order-view', compact('orders', 'shippings', 'order_details'));
    }



}
