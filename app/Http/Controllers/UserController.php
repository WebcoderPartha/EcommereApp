<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Yoeunes\Toastr\Facades\Toastr;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function LogOut(){
        Auth::logout();
        // Destroy Coupon checkout
        Session::forget('coupon');
        Toastr::success('Sign out Successfully');
        return redirect()->route('login');
    }

    public function changePassword(){
        return view('auth.passwords.change-password');
    }

    public function updatePassword(Request $request){
        $this->validate($request, [
           'oldpassword' => 'required|min:6|max:20',
           'password' => 'required|min:6|max:20',
           'confirm_password' => 'required|min:6|max:20',
        ]);

        $hashPassword = Auth::user()->password;
        $oldP = $request->oldpassword;
        $newP = $request->password;
        $confP= $request->confirm_password;

        if (Hash::check($oldP, $hashPassword)){
            if(!Hash::check($newP, $hashPassword)){
                if ($newP === $confP){

                    $user = User::find(Auth::id());
                    $user->password = Hash::make($request->password);
                    $user->save();

                    Auth::logout();

                    Toastr::success('Password changed successfully! Now Sign in with your new password.');
                    return redirect()->route('login');

                }else{
                    Toastr::warning('New password & confirm password not matched!');
                    return redirect()->back();
                }
            }else{
                Toastr::warning('Old password & new password would not be same!');
                return redirect()->back();
            }
        }else{
            Toastr::warning('Old password not matched!');
            return redirect()->back();
        }

    }

}
