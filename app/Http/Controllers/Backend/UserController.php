<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function UserView(){
        $users = User::latest()->get();
		return view('backend.user.view_user',compact('users'));
    }

    public function NormalUser($id){
        User::findOrFail($id)->update(['type_user' => 0]);
        $notification = array(
           'message' => 'Type user change to Normal User',
           'alert-type' => 'success'
       );
       return redirect()->back()->with($notification);
    }

    public function Proveedor($id){
        User::findOrFail($id)->update(['type_user' => 1]);
        $notification = array(
           'message' => 'Type user change to Supplier',
           'alert-type' => 'success'
       );
       return redirect()->back()->with($notification);
    }
}
