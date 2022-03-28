<?php

namespace App\Http\Controllers\Backend;
use App\Models\Messages;
use App\Models\PreciosEnvios;
use App\Models\DatosBanco;

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
            'message' => 'Precio Actualizado correctamente',
            'alert-type' => 'success'
        );
        return redirect()->route('precios-envios')->with($notification);
        
    }

    public function DatosDavivienda(){
        $davivienda = DatosBanco::where('banco', 'Davivienda')->first();
        return view('backend.messages.davivienda', compact('davivienda'));
    }

    public function DaviviendaEdit(Request $request){
        $davivienda = DatosBanco::where('banco', 'Davivienda')->first();

        DatosBanco::findOrFail($davivienda->id)->update([
            'tipo' => $request->tipo,
            'numero' => $request->numero,
            'cc' => $request->cc,
            'titular' => $request->titular,
        ]);
        $notification = array(
            'message' => 'Datos de Banco Davivienda Actualizado correctamente',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function DatosBancolombia(){
        $bancolombia = DatosBanco::where('banco', 'Bancolombia')->first();
        return view('backend.messages.bancolombia', compact('bancolombia'));
    }

    public function BancolombiaEdit(Request $request){
        $bancolombia = DatosBanco::where('banco', 'Bancolombia')->first();

        DatosBanco::findOrFail($bancolombia->id)->update([
            'tipo' => $request->tipo,
            'numero' => $request->numero,
            'cc' => $request->cc,
            'titular' => $request->titular,
        ]);
        $notification = array(
            'message' => 'Datos de Banco Bancolombia Actualizado correctamente',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
