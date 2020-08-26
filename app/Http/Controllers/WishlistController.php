<?php

namespace App\Http\Controllers;

use App\Product;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yoeunes\Toastr\Facades\Toastr;

class WishlistController extends Controller
{

    public function addWishlist($id){
        // User Authentication ID
        $userid = Auth::id();

        // Check Authentication user product already wishlist has or not
        $check  = Wishlist::where('user_id', $userid)->where('product_id', $id)->first();


        // Check user Authentication Or Not
        if (Auth::check()){

            // Check Authentication user product already wishlist has or not
            if ($check){

                return response()->json(['error' => 'Already has in your wishlist!']);

            }else{

                $wishlist = new Wishlist;
                $wishlist->user_id = $userid;
                $wishlist->product_id = $id;
                $wishlist->save();

                return response()->json(['success' => 'Added in your wishlist.']);

            }

        }else{

            return response()->json(['error' => 'Sign in your account first!']);

        }


    }


    public function showWishlist(){

        $wishlistdata = Wishlist::where('user_id', Auth::id())->get();
        $wishlist = count($wishlistdata);

        return response()->json([
            'wishlist' => $wishlist
        ]);

    }

    public function wishListPage(){
        if (Auth::check()){
            $user_id = Auth::id();
            $wishlists = Wishlist::with('product', 'user')->where('user_id', $user_id)->get();
            return view('pages.wishlist', compact('wishlists'));
        }else{
            Toastr::warning('Sign in your account for see your wishlist!');
            return redirect()->route('login');
        }

    }

    public function removeWishlist($id){
//        $user_id = Auth::id();
//        Wishlist::where('user_id', $user_id)->where('product_id', $id)->delete();
        if (Auth::check()){
            $wishlist = Wishlist::findOrFail($id);
            $wishlist->delete();
            Toastr::success('Successfully removed from your wishlist');
            Return redirect()->back();
        }
    }

}
