<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yoeunes\Toastr\Facades\Toastr;

class ReturnOrderController extends Controller
{

    public function viewReturnOrder(){

        $return_order = Order::where('user_id', Auth::id())->where('status', 3)->get();

        return view('pages.return-order', compact('return_order'));

    }

    public function returnOrderRequest(Request $request, $id){

        $order = Order::where('order_id', $request->id)->first();
        $order->return_order = 1;
        $order->save();

        Toastr::success('Return order request sent successfully');
        return redirect()->back();

    }

}
