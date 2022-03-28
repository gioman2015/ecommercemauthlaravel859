<?php

namespace App\Http\Controllers\Backend;
use App\Models\Messages;
use App\Models\PreciosEnvios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function Web(){
        $messages = Messages::where('type', 'Web')->first();
        return view('backend.messages.web', compact('messages'));
    }

    public function WebUpdate(Request $request){
        $request->validate([
            'message' => 'required',
        ],[
            'message.required' => 'Ingrese un mensaje',
        ]);
        Messages::findOrFail(1)->update([
            'message' => $request->message,
        ]);
        $notification = array(
            'message' => 'Mensaje actualizado con exito',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function Email(){
        $messages = Messages::where('type', 'Mail')->first();
        return view('backend.messages.mail', compact('messages'));
    }

    public function EmailUpdate(Request $request){
        $request->validate([
            'message' => 'required',
        ],[
            'message.required' => 'Ingrese un mensaje',
        ]);
        Messages::findOrFail(2)->update([
            'message' => $request->message,
        ]);
        $notification = array(
            'message' => 'Mensaje actualizado con exito',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function PreciosEnvios(){
        $envios = PreciosEnvios::latest()->get();
        return view('backend.messages.envios', compact('envios'));
    }

    public function PreciosUpdate($id){
        $envios = PreciosEnvios::findOrFail($id);
        return view('backend.messages.envios_edit', compact('envios'));
    }

    public function PreciosEdit(Request $request){
        $precio_id = $request->id;

        PreciosEnvios::findOrFail($precio_id)->update([
            'price' => $request->price,
        ]);
        $notification = array(
            'message' => 'Precio Actualizado con éxito',
            'alert-type' => 'success'
        );
        return redirect()->route('precios-envios')->with($notification);

    }
}
