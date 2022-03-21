<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Image;

class CategoryController extends Controller
{
    public function CategoryView(){
        $categories = Category::latest()->get();
        return view('backend.category.category_view', compact('categories'));
    }

    public function CategoryStore(Request $request){
        $request->validate([
            'category_name_en' => 'required',
            'category_name_esp' => 'required',
            /* 'category_icon' => 'required', */
        ],[
            'category_name_en.required' => 'Input Category English Name',
            'category_name_esp.required' => 'Input Category Spanish Name',
        ]);

        $image = $request->file('category_slider');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen.".".$img_ext;
        $up_location = 'upload/category_slider/';
        $last_img = $up_location.$img_name;
        $image->move($up_location,$img_name);

        if ($request->category_order) {
            Category::insert([
                'category_name_en' => $request->category_name_en,
                'category_name_esp' => $request->category_name_esp,
                'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
                'category_slug_esp' => strtolower(str_replace(' ','-',$request->category_name_esp)),
                'category_icon' => $request->category_icon,
                'category_order' => $request->category_order,
                'slider_categoria_img' => $last_img,
            ]);
        }else {
            Category::insert([
                'category_name_en' => $request->category_name_en,
                'category_name_esp' => $request->category_name_esp,
                'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
                'category_slug_esp' => strtolower(str_replace(' ','-',$request->category_name_esp)),
                'category_icon' => $request->category_icon,
                'category_order' => '1',
                'slider_categoria_img' => $last_img,
            ]);
        }
        

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function CategoryUpdate($id){
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    }

    public function CategoryEdit(Request $request){
        $category_id = $request->id;
    
        $slider_image = $request->file('category_slider');
        /* dd($request); */
        if($slider_image){
            $old_img = $request->old_image;
            $image = $request->file('category_slider');
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen.".".$img_ext;
            $up_location = 'upload/category_slider/';
            $last_img = $up_location.$img_name;
            $image->move($up_location,$img_name);
    
            try {
                unlink($old_img);
            } catch (\Throwable $th) {
                
            }
    
            Category::findOrFail($category_id)->update([
                'category_name_en' => $request->category_name_en,
                'category_name_esp' => $request->category_name_esp,
                'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
                'category_slug_esp' => strtolower(str_replace(' ','-',$request->category_name_esp)),
                'category_icon' => $request->category_icon,
                'category_order' => $request->category_order,
                'slider_categoria_img' => $up_location.$img_name,
            ]);
    
            $notification = array(
                'message' => 'Category Updated Successfully with image',
                'alert-type' => 'success'
            );
            return redirect()->route('all.category')->with($notification);
        }else{
            Category::findOrFail($category_id)->update([
                'category_name_en' => $request->category_name_en,
                'category_name_esp' => $request->category_name_esp,
                'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
                'category_slug_esp' => strtolower(str_replace(' ','-',$request->category_name_esp)),
                'category_icon' => $request->category_icon,
                'category_order' => $request->category_order,
            ]);
    
            $notification = array(
                'message' => 'Category Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.category')->with($notification);
        }   
    }

    public function CategoryDelete($id){
        $image = Category::findOrFail($id);
        $old_image = $image->slider_categoria_img;

        try {
            unlink($old_image);
        } catch (\Throwable $th) {
            
        }

        Category::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
