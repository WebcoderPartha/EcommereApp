<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function todayReport(){

        $today = date('d-m-y');
        $orders = Order::where('status', 0)->where('date', $today)->get();
        return view('admin.order.today-order', compact('orders'));

    }

    public function todayDelivery(){

        $today = date('d-m-y');
        $orders = Order::where('status', 3)->where('date', $today)->get();
        return view('admin.order.today-delivery', compact('orders'));

    }

    public function thisMonth(){

        $month = date('F');
        $orders = Order::where('status', 3)->where('month', $month)->get();
        return view('admin.order.this-month', compact('orders'));

    }

    public function searchReport(){

        return view('admin.order.search-report');

    }

    public function searchByDate(Request $request){

        // Date Formatting
        $date = date('d-m-y', strtotime($request->date));
        $orders = Order::where('status', 3)->where('date', $date)->get();
        $total_amount = Order::where('status', 3)->where('date', $date)->sum('total');
        return view('admin.order.search-by-date', compact('orders', 'total_amount'));

    }

    public function searchByMonth(Request $request){

        $month = $request->month;
        $orders = Order::where('status', 3)->where('month', $month)->get();
        $total_amount = Order::where('status', 3)->where('month', $month)->sum('total');
        return view('admin.order.search-by-month', compact('orders', 'total_amount'));

    }

    public function searchByYear(Request $request){

        $year = $request->year;
        $orders = Order::where('status', 3)->where('year', $year)->get();
        $total_amount = Order::where('status', 3)->where('year', $year)->sum('total');
        return view('admin.order.year-by-search', compact('orders', 'total_amount'));

    }


}
