<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yoeunes\Toastr\Facades\Toastr;

class AdminRoleController extends Controller
{

    public function adminAllUsers(){

        $admin_users = Admin::where('type', 2)->get();
        return view('admin.role.all-users', compact('admin_users'));

    }

    public function adminCreateUser(){

        return view('admin.role.create');

    }

    public function adminUserStore(Request $request){

        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email|unique:admins',
            'phone'     => 'required|unique:admins',
            'password'  => 'required'
        ]);

        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = Hash::make($request->password);
        $admin->type = 2;
        $admin->category = $request->category;
        $admin->coupon = $request->coupon;
        $admin->products = $request->products;
        $admin->orders = $request->orders;
        $admin->blog = $request->blog;
        $admin->reports = $request->reports;
        $admin->users = $request->users;
        $admin->return_order = $request->return_order;
        $admin->contact_message = $request->contact_message;
        $admin->product_comment = $request->product_comment;
        $admin->site_setting = $request->site_setting;
        $admin->others = $request->others;
        $admin->save();

        Toastr::success('Child admin created successfully');
        return redirect()->route('admin.all.users');


    }

    public function adminUserEdit($id){

        $admin = Admin::findOrFail($id);
        return view('admin.role.edit', compact('admin'));

    }

    public function adminUserUpdate(Request $request, $id){

        $admin = Admin::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,'.$admin->id.',id',
            'phone' => 'required|unique:admins,phone,'.$admin->id.',id',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->type = 2;
        $admin->category = $request->category;
        $admin->coupon = $request->coupon;
        $admin->products = $request->products;
        $admin->orders = $request->orders;
        $admin->blog = $request->blog;
        $admin->reports = $request->reports;
        $admin->users = $request->users;
        $admin->return_order = $request->return_order;
        $admin->contact_message = $request->contact_message;
        $admin->product_comment = $request->product_comment;
        $admin->site_setting = $request->site_setting;
        $admin->others = $request->others;
        $admin->save();

        Toastr::success('Child admin updated successfully');
        return redirect()->route('admin.all.users');

    }

    public function adminUserDestroy($id){

        $admin = Admin::findOrFail($id);
        $admin->delete();

        Toastr::success('Child admin deleted successfully');
        return redirect()->route('admin.all.users');

    }

}
