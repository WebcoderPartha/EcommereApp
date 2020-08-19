<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){

        return view('admin.dashboard');

    }


    public function adminLogOut(){
        Auth::logout();
        toastr()->success('Admin logout successfully!');
        return redirect()->route('admin.login');
    }

    public function ChangePassword(){
        return view('admin.auth.change-password');
    }
    public function UpdatePassword(Request $request){
        $this->validate($request, [
            'oldPassword' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);

        $HashPassword = Auth::user()->password;
        $oldpassword = $request->oldPassword;
        $newpassword = $request->password;
        $confirmpass = $request->password_confirmation;

        if (Hash::check($oldpassword, $HashPassword)){
            if (!Hash::check($newpassword, $HashPassword)){
                if ($newpassword === $confirmpass){
                    $user = Admin::find(Auth::id());
                    $user->password = Hash::make($request->password);
                    $user->save();
                    Auth::logout();
                    toastr()->success('Password changed successfully! Now login with your new password.');
                    return redirect()->route('admin.login');
                }else{
                    toastr()->error('New password & old password not matched!');
                    return redirect()->back();
                }
            }else{
                toastr()->error('New password can not be the old password!');
                return redirect()->back();
            }

        }else{
            toastr()->error('Old password doesn\'t matched!');
            return redirect()->back();
        }

    }



}
