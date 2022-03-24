<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use App\Models\Address;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function DistrictGetAjax($division_id){
    	$ship = ShipDistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
    	return json_encode($ship);
    } // end method 

     public function StateGetAjax($district_id){
    	$ship = ShipState::where('district_id',$district_id)->orderBy('state_name','ASC')->get();
    	return json_encode($ship);
    } // end method 

    public function CheckoutStore(Request $request){
        /* dd($request); */
        $typedistrict = ShipDistrict::where('id', $request->district_id)->first();
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['cedula'] = $request->cedula;
        $data['address'] = $request->address;
        $data['address2'] = $request->address2;
        $data['barrio'] = $request->barrio;
        $data['notes'] = $request->notes;
        $data['weigth'] = $request->weigth;
        $data['type'] = $typedistrict->type;
        
        $cartTotal = Cart::total();

        /* dd($typedistrict->type); */
        $payment_method = 'cash';

        $address = Address::where('user_id',$request->user_id)->first();
        if ($address == null) {
            Address::insert([
                'user_id' => $request->user_id,
                'division_id' => $request->division_id,
                'district_id' => $request->district_id,
                'address' => $request->address,
                'address2' => $request->address2,
                'barrio' => $request->barrio,
                'notes' => $request->notes,
            ]);
        }else {
            Address::findOrFail($address->id)->update([
                'user_id' => $request->user_id,
                'division_id' => $request->division_id,
                'district_id' => $request->district_id,
                'address' => $request->address,
                'address2' => $request->address2,
                'barrio' => $request->barrio,
                'notes' => $request->notes,
            ]);            
        }
        
/* dd($request); */
        if ($request->payment_method == 'stripe') {
            return view('frontend.payment.stripe',compact('data','cartTotal'));
        }elseif ($request->payment_method == 'card') {
            return 'card';
        }else{
            return view('frontend.payment.cash',compact('data','cartTotal'));
        }
    }// end mehtod. 

    public function CheckoutMessage(){
        $messages = Messages::where('type', 'Web')->first();
        return view ('frontend.payment.message', compact('messages'));
    }// end method.
}
