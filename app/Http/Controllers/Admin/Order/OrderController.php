<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Order;
use App\Orderdetail;
use App\Shipping;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

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

    public function PaymentAccept($id){

        $accept_payment = Order::findOrFail($id);
        $accept_payment->status = 1;
        $accept_payment->save();

        Toastr::success('Order has been accepted');
        return redirect()->route('pending.order');

    }

    public function PaymentCancel($id){

        $canel_payment = Order::findOrFail($id);
        $canel_payment->status = 4;
        $canel_payment->save();

        Toastr::success('Order has been cancelled');
        return redirect()->route('pending.order');

    }

    public function acceptedOrder(){

        $accepted_order = Order::where('status', 1)->get();
        return view('admin.order.accepted-order', compact('accepted_order'));

    }

    public function cancelOrder(){

        $cancel_order = Order::where('status', 4)->get();
        return view('admin.order.cancel-order', compact('cancel_order'));

    }

    public function processDelivery(){

        $process_delivery = Order::where('status', 2)->get();
        return view('admin.order.process-delivery', compact('process_delivery'));

    }

    public function deliveredOrder(){

        $delivered_order = Order::where('status', 3)->get();
        return view('admin.order.delivered-order', compact('delivered_order'));

    }

    public function orderProcessDelivery($id){

        $processingOrder = Order::findOrFail($id);
        $processingOrder->status = 2;
        $processingOrder->save();

        Toastr::success('Order has been processing');
        return redirect()->route('process.delivery');

    }

    public function orderDeliverySuccess($id){

        $deliverySuccess = Order::findOrFail($id);
        $deliverySuccess->status = 3;
        $deliverySuccess->save();

        Toastr::success('Order delivery done');
        return redirect()->route('delivered.order');

    }

}
