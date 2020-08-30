<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Order;
use App\Orderdetail;
use App\Shipping;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function pendingOrder(){

        $pending_order = Order::where('status', 0)->get();
        return view('admin.order.pending-order', compact('pending_order'));

    }

    public function viewOrder($id){

        $orders = Order::with('user')->where('id', $id)->first();
        $shipping_details = Shipping::where('order_id', $id)->first();
        $Order_details = Orderdetail::with('product', 'order')->where('order_id', $id)->get();
        return view('admin.order.view-order', compact('orders', 'shipping_details', 'Order_details'));

    }

}
