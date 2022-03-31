<?php

namespace App\Http\Controllers\Backend;
use App\Models\Messages;
use App\Models\PreciosEnvios;
use App\Models\DatosBanco;
use App\Models\HeaderConfig;
use Image;

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
    
    public function HeaderFrontend(){
        $header = HeaderConfig::latest()->first();
        /* dd($header); */
        return view('backend.messages.headerfrontend', compact('header'));
    }

    public function HeaderEdit(Request $request){
        
        if ($request->background_color) {
            $background_color = $request->background_color;
        } else {
            $background_color = '#141414';
        }

        if ($request->background_imagen) {
            $background_imagen = $request->background_imagen;
        } else {
            $background_imagen = null;
        }
        $old_img = $request->old_image;
        
        if($background_imagen){
            $image = $request->file('background_imagen');

            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $imgresize = Image::make($image)->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('upload/header/'.$name_gen);
            $last_img = 'upload/header/'.$name_gen;

            try {
                unlink($old_img);
            } catch (\Throwable $th) {
                //throw $th;
            }

            HeaderConfig::findOrFail(1)->update([
                'background_color' => $background_color,
                'background_imagen' => $last_img,
            ]);
            $notification = array(
                'message' => 'Configuracion Header con éxito',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            
            try {
                unlink($old_img);
            } catch (\Throwable $th) {
                //throw $th;
            }
            HeaderConfig::findOrFail(1)->update([
                'background_color' => $background_color,
                'background_imagen' => '',
            ]);
            $notification = array(
                'message' => 'Configuracion Header con éxito',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification); 
        }
    }
}
