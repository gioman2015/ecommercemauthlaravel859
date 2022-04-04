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

        $image = $request->file('category_slider1');
        $image2 = $request->file('category_slider2');
        $image3 = $request->file('category_slider3');

        if ($image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen.".".$img_ext;
            $up_location = 'upload/category_slider/';
            $last_img = $up_location.$img_name;
            $image->move($up_location,$img_name);
        }else {
            $last_img = '';
        }

        if ($image2) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image2->getClientOriginalExtension());
            $img_name = $name_gen.".".$img_ext;
            $up_location = 'upload/category_slider/';
            $last_img2 = $up_location.$img_name;
            $image2->move($up_location,$img_name);
        }else {
            $last_img2 = '';
        }

        if ($image3) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image3->getClientOriginalExtension());
            $img_name = $name_gen.".".$img_ext;
            $up_location = 'upload/category_slider/';
            $last_img3 = $up_location.$img_name;
            $image3->move($up_location,$img_name);
        }else {
            $last_img3 = '';
        }

        if ($request->category_order) {
            Category::insert([
                'category_name_en' => $request->category_name_en,
                'category_name_esp' => $request->category_name_esp,
                'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
                'category_slug_esp' => strtolower(str_replace(' ','-',$request->category_name_esp)),
                'category_icon' => $request->category_icon,
                'category_order' => $request->category_order,
                'slider_categoria_1' => $last_img,
                'slider_categoria_2' => $last_img2,
                'slider_categoria_3' => $last_img3,
            ]);
        }else {
            Category::insert([
                'category_name_en' => $request->category_name_en,
                'category_name_esp' => $request->category_name_esp,
                'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
                'category_slug_esp' => strtolower(str_replace(' ','-',$request->category_name_esp)),
                'category_icon' => $request->category_icon,
                'category_order' => '1',
                'slider_categoria_1' => $last_img,
                'slider_categoria_2' => $last_img2,
                'slider_categoria_3' => $last_img3,
            ]);
        }


        $notification = array(
            'message' => 'Categoría Insertada con éxito',
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

        $slider_image = $request->file('category_slider1');
        $slider_image2 = $request->file('category_slider2');
        $slider_image3 = $request->file('category_slider3');

        if ($slider_image2) {
            $old_img = $request->old_image2;
            $image = $request->file('category_slider2');
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
                'slider_categoria_2' => $up_location.$img_name,
            ]);
        }else {
            $old_img = $request->old_image2;
            try {
                unlink($old_img);
            } catch (\Throwable $th) {

            }
            Category::findOrFail($category_id)->update([
                'slider_categoria_2' => '',
            ]);
        }

        if ($slider_image3) {
            $old_img = $request->old_image3;
            $image = $request->file('category_slider3');
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
                'slider_categoria_3' => $up_location.$img_name,
            ]);
        }else {
            $old_img = $request->old_image3;
            try {
                unlink($old_img);
            } catch (\Throwable $th) {

            }
            Category::findOrFail($category_id)->update([
                'slider_categoria_3' => '',
            ]);
        }

        /* dd($request); */
        if($slider_image){
            $old_img = $request->old_image;
            $image = $request->file('category_slider1');
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
                'slider_categoria_1' => $up_location.$img_name,
            ]);

            $notification = array(
                'message' => 'Categoría Actualizada Exitosamente con la imagen',
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
                'message' => 'Categoría Actualizada con éxito',
                'alert-type' => 'success'
            );
            return redirect()->route('all.category')->with($notification);
        }
    }

    public function CategoryDelete($id){
        $image = Category::findOrFail($id);
        $old_image = $image->slider_categoria_1;
        $old_image2 = $image->slider_categoria_2;
        $old_image3 = $image->slider_categoria_3;

        try {
            unlink($old_image);
        } catch (\Throwable $th) {

        }
        try {
            unlink($old_image2);
        } catch (\Throwable $th) {

        }
        try {
            unlink($old_image3);
        } catch (\Throwable $th) {

        }

        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Categoría Eliminada con éxito',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
