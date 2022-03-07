<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Wishlist;
use Carbon\Carbon;

class WishlistController extends Controller
{
    public function ViewWishlist(){
		return view('frontend.wishlist.view_wishlist');
	}

    public function GetWishlistProduct(){
        if (Auth::check()) {
            $type_user = Auth::user()->type_user;
        } else {
            $type_user = 0;
        }
		$wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
		return response()->json($wishlist);
	} // end method
}
