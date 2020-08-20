<?php

namespace App\Http\Controllers\Admin\Category;

use App\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.coupon.coupon', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'coupon'    => 'required|unique:coupons',
            'discount'  => 'required'
        ]);

        $coupon = new Coupon;
        $coupon->coupon = $request->coupon;
        $coupon->discount = $request->discount;
        $coupon->save();
        Toastr::success($request->coupon. ' coupon added successfully');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupon.edit-coupon', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $coupon = Coupon::findOrFail($id);
        $this->validate($request, [
            'coupon'    => 'required|unique:coupons,coupon,'.$coupon->id.',id',
            'discount'  => 'required'
        ]);

        $coupon->coupon = $request->coupon;
        $coupon->discount = $request->discount;

        if ($coupon->isDirty(['coupon', 'discount'])){

            $coupon->save();
            Toastr::success($request->coupon. ' coupon updated successfully');
            return redirect()->route('coupons.list');

        }else{

            Toastr::warning('Nothing to updated');
            return redirect()->route('coupons.list');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        Toastr::success($coupon->coupon. ' coupon deleted successfully');
        return redirect()->back();

    }

}
