<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class ReturnOrderController extends Controller
{

    public function orderReturnRequests(){

        $return_order = Order::where('return_order', 1)->get();

        return view('admin.return.return_order', compact('return_order'));

    }

    public function approveReturnOrder($id){

        $order = Order::where('order_id', $id)->first();
        $order->return_order = 2;
        $order->save();

        Toastr::success('Return order request approved');
        return redirect()->back();

    }

    public function returnOrderAll(){

        $return_order = Order::where('return_order', 2)->get();
        return view('admin.return.return-all-order', compact('return_order'));

    }


}
