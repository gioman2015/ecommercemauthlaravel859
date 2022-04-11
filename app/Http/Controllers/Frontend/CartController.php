<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use App\Models\Wishlist;
use Carbon\Carbon;
use App\Models\Coupon;
use Illuminate\Support\Facades\Session;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\Address;
use DB;
use App\Models\Category;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id){
		if (Session::has('coupon')) {
			Session::forget('coupon');
		 }
    	$product = Product::findOrFail($id);
    	if ($product->discount_price == NULL) {
    		Cart::add([
    			'id' => $id,
    			'name' => $request->product_name,
				'product_weight' => $product->product_weight,
    			'qty' => $request->quantity,
    			'price' => $request->selling_price,
    			'weight' => 1,
    			'options' => [
    				'image' => $product->product_thambnail,
    				'color' => $request->color,
    				'size' => $request->size,
					'product_weight' => $product->product_weight,
    			],
    		]);
    		return response()->json(['success' => 'Añadido con éxito en su carrito']);
    	}else{
    		Cart::add([
    			'id' => $id,
    			'name' => $request->product_name,
				'product_weight' => $product->product_weight,
    			'qty' => $request->quantity,
    			'price' => $request->discount_price,
    			'weight' => 1,
    			'options' => [
    				'image' => $product->product_thambnail,
    				'color' => $request->color,
    				'size' => $request->size,
					'product_weight' => $product->product_weight,
    			],
    		]);
    		return response()->json(['success' => 'Añadido con éxito en su carrito']);
    	}
    } // end mehtod

    // Mini Cart Section
    public function AddMiniCart(){
    	$carts = Cart::content();
    	$cartQty = Cart::count();
    	$cartTotal = Cart::total();

    	return response()->json(array(
    		'carts' => $carts,
    		'cartQty' => $cartQty,
    		'cartTotal' => $cartTotal,
    	));
    } // end method

    // remove mini cart
    public function RemoveMiniCart($rowId){
    	Cart::remove($rowId);
		if (Session::has('coupon')) {
			Session::forget('coupon');
		 }
    	return response()->json(['success' => 'Producto Eliminar del carrito']);

    } // end mehtod

	public function AddToWishlist(Request $request, $product_id){
		if (Auth::check()) {
            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();
            if (!$exists) {
				Wishlist::insert([
					'user_id' => Auth::id(),
					'product_id' => $product_id,
					'created_at' => Carbon::now(),
				]);
			   return response()->json(['success' => 'Añadido con éxito en su lista de deseos']);
			} else {
				return response()->json(['error' => 'Este producto ya está en su lista de deseos']);
			}
        }else{
            return response()->json(['error' => 'Primero inicie sesión con su cuenta']);
        }
    } // end method

	public function CouponApply(Request $request){
		$coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
        if ($coupon) {
			/* $amount = strval(Cart::total() * $coupon->coupon_discount/100); */
			/* dd(round(Cart::total() - Cart::total() * $coupon->coupon_discount/100,3)); */
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100,3),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100,3)
			]);
            return response()->json(array(
				'validity' => true,
                'success' => 'Cupón aplicado con éxito'
            ));
        }else{
            return response()->json(['error' => 'Invalid Coupon']);
        }
    } // end method

	public function CouponCalculation(){
        if (Session::has('coupon')) {
			/* dd(session()->get('coupon')); */
            return response()->json(array(
                'subtotal' => Cart::total(),
				'subtotal_format' => number_format(Cart::total(),0,",","."),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => round(session()->get('coupon')['discount_amount']),
                'total_amount' => round(session()->get('coupon')['total_amount']),
				'discount_amount_format' => number_format(round(session()->get('coupon')['discount_amount']),0,",","."),
				'total_amount_format' => number_format(round(session()->get('coupon')['total_amount']),0,",","."),
            ));
        }else{
            return response()->json(array(
                'total' => Cart::total(),
				'total_format' => number_format(Cart::total(),0,",","."),
            ));
        }
    } // end method

	// Remove Coupon
    public function CouponRemove(){
        Session::forget('coupon');
        return response()->json(['success' => 'Cupón Eliminar con éxito']);
    }
	// Checkout Method
    public function CheckoutCreate(){
        if (Auth::check()) {
            if (Cart::total() > 0) {
				$user = Auth::user();
				$address = Address::where('user_id',$user->id)->first();
				/* dd($address); */
				$carts = Cart::content();
				$cartQty = Cart::count();
				$cartTotal = Cart::total();
				$divisions = ShipDivision::orderBy('division_name','ASC')->get();
				$district = ShipDistrict::orderBy('district_name','ASC')->get();
				return view('frontend.checkout.checkout_view',compact('carts','cartQty','cartTotal','divisions','district','address'));
            }else{
				$notification = array(
				'message' => 'Debe de agregar un producto antes',
				'alert-type' => 'error'
				);
				return redirect()->to('/')->with($notification);
            }

        }else{
             $notification = array(
            'message' => 'Necesita iniciar sesión en primer lugar',
            'alert-type' => 'error'
        );
        return redirect()->route('login')->with($notification);
        }
    } // end method

	public function Search(Request $request){
		$item = $request->search;
		/* echo "$item"; */
		$categories = Category::orderBy('category_name_en','ASC')->get();
		$products = DB::table('products')->where('product_name_en','LIKE',"%$item%")->paginate(20);
		return view('frontend.product.search',compact('products','categories'));

	} // end method

}
