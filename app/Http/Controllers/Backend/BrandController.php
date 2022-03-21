<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    public function BrandView(){
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view', compact('brands'));
    }

    public function BrandStore(Request $request){
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_esp' => 'required',
            'brand_image' => 'required',
        ],[
            'brand_name_en.required' => 'Input Brand English Name',
            'brand_name_esp.required' => 'Input Brand Spanish Name',
        ]);
        $image = $request->file('brand_image');

        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $imgresize = Image::make($image)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save('upload/brand/'.$name_gen);
        $last_img = 'upload/brand/'.$name_gen;
        /* dd($imgresize); */

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_esp' => $request->brand_name_esp,
            'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name_en)),
            'brand_slug_esp' => strtolower(str_replace(' ','-',$request->brand_name_esp)),
            'brand_image' => $last_img,
        ]);

        $notification = array(
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function BrandUpdate($id){
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit', compact('brand'));
    }

    public function BrandEdit(Request $request){
        $brand_id = $request->id;
        $old_img = $request->old_image;
        $brand_image = $request->file('brand_image');

        if($brand_image){
            $image = $request->file('brand_image');

            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $imgresize = Image::make($image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('upload/brand/'.$name_gen);
            $last_img = 'upload/brand/'.$name_gen;
    
            try {
                unlink($old_img);
            } catch (\Throwable $th) {
                //throw $th;
            }
    
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_esp' => $request->brand_name_esp,
                'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name_en)),
                'brand_slug_esp' => strtolower(str_replace(' ','-',$request->brand_name_esp)),
                'brand_image' => $last_img,
            ]);
            $notification = array(
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.brand')->with($notification);
        }else{
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_esp' => $request->brand_name_esp,
                'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name_en)),
                'brand_slug_esp' => strtolower(str_replace(' ','-',$request->brand_name_esp)),
                'brand_image' => $old_img,
            ]);
            $notification = array(
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.brand')->with($notification);
        }
    }

    public function BrandDelete($id){

        $image = Brand::findOrFail($id);
        $old_image = $image->brand_image;
        try {
            unlink($old_image);
        } catch (\Throwable $th) {
            //throw $th;
        }

        Brand::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}