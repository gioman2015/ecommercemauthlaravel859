<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\MultiImg;
use Carbon\Carbon;
use Image;


class ProductController extends Controller
{
    public function AddProduct(){
        $categories = Category::latest()->get();
		$brands = Brand::latest()->get();
		return view('backend.product.product_add',compact('categories','brands'));
    }

    public function StoreProduct(Request $request){
        $image = $request->file('product_thambnail');

        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $imgresize = Image::make($image)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save('upload/products/thambnail/'.$name_gen);
        $last_img = 'upload/products/thambnail/'.$name_gen;
        
        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_esp' => $request->product_name_esp,
            'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
            'product_slug_esp' => strtolower(str_replace(' ','-',$request->product_name_esp)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_esp' => $request->product_tags_esp,
            'product_size_en' => $request->product_size_en,
            'product_size_esp' => $request->product_size_esp,
            'product_color_en' => $request->product_color_en,
            'product_color_esp' => $request->product_color_esp,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'supplier_price' => $request->supplier_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_esp' => $request->short_descp_esp,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_esp' => $request->long_descp_esp,
            'hot_deals' => $request->hot_deals,

            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'product_thambnail' => $last_img,
            'status' => 1,
            'created_at' => Carbon::now(), 
        ]);

        ////////// Multiple Image Upload Start ///////////

        $multi_imgs = $request->file('multi_img');

        foreach($multi_imgs as $multi_img){
            $name_gen = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
            $imgresize = Image::make($multi_img)->resize(450, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('upload/products/multi-image/'.$name_gen);
            $last_img = 'upload/products/multi-image/'.$name_gen;

            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $last_img,
                'photo_name' => '1',
                'created_at' => Carbon::now()
            ]);
        }
        //End Foreach
        ////////// Multiple Image Upload End ///////////
        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('manage-product')->with($notification);
    }

    public function ManageProduct(){
        $products = Product::latest()->get();
        return view('backend.product.view_product', compact('products'));
    }

    public function EditProduct($id){
        $multiImgs = MultiImg::where('product_id',$id)->get();
        $categories = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $brands = Brand::latest()->get();
        $products = Product::findOrFail($id);
        return view('backend.product.product_edit', compact('categories','subcategory','subsubcategory','brands','products','multiImgs'));
    }

    public function ProductDataUpdate(Request $request){
        $product_id = $request->id;
        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_esp' => $request->product_name_esp,
            'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
            'product_slug_esp' => strtolower(str_replace(' ','-',$request->product_name_esp)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_esp' => $request->product_tags_esp,
            'product_size_en' => $request->product_size_en,
            'product_size_esp' => $request->product_size_esp,
            'product_color_en' => $request->product_color_en,
            'product_color_esp' => $request->product_color_esp,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'supplier_price' => $request->supplier_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_esp' => $request->short_descp_esp,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_esp' => $request->long_descp_esp,
            'hot_deals' => $request->hot_deals,

            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(), 
        ]);

        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('manage-product')->with($notification);
    }//end method

    /// Multiple Image Add Update
	public function MultiImageAdd(Request $request){
        $pro_id = $request->id;
        $multi_imgs = $request->file('multi_img');

        foreach($multi_imgs as $multi_img){
            $name_gen = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
            $imgresize = Image::make($multi_img)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('upload/products/multi-image/'.$name_gen);
            $last_img = 'upload/products/multi-image/'.$name_gen;

            MultiImg::insert([
                'product_id' => $pro_id,
                'photo_name' => $last_img,
                'image_order' => '1',
                'created_at' => Carbon::now()
            ]);
        }
        $notification = array(
			'message' => 'Product Image Add Successfully',
			'alert-type' => 'info'
		);
		return redirect()->back()->with($notification);
	} // end mehtod

    /* public function MultiImageUpdateOrder(Request $request){
        $order = $request->image_order;
         dd($order);
        foreach ($order as $id => $ord) {
            error_log($ord);
            MultiImg::where('id',$id)->update([
                'image_order' => $imgordr->image_order,
                'updated_at' => Carbon::now(),
            ]);
        }
    } */

    /// Multiple Image Update
	public function MultiImageUpdate(Request $request){
        $orderimg = $request->image_order;
		$imgs = $request->multi_img;
        foreach ($orderimg as $order => $ord) {
            /* dd($ord); */
            MultiImg::where('id',$order)->update([
                'image_order' => $ord,
                'updated_at' => Carbon::now(),
            ]);
        }

        if ($imgs ==null) {
            
        }else {        
            foreach ($imgs as $id => $img) {
                $imgDel = MultiImg::findOrFail($id);
                try {
                    unlink($imgDel->photo_name);
                } catch (\Throwable $th) {
                    //throw $th;
                }

                $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                $imgresize = Image::make($img)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('upload/products/multi-image/'.$name_gen);
                $last_img = 'upload/products/multi-image/'.$name_gen;

                MultiImg::where('id',$id)->update([
                    'photo_name' => $last_img,
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
        $notification = array(
			'message' => 'Product Image Updated Successfully',
			'alert-type' => 'info'
		);
		return redirect()->back()->with($notification);
	} // end mehtod

    /// Product Main Thambnail Update /// 
    public function ThambnailImageUpdate(Request $request){
        $pro_id = $request->id;
        $oldImage = $request->old_img;
        $image = $request->file('product_thambnail');

        if ($image == null) {
            # code...
        }else {
            try {
                unlink($oldImage);
            } catch (\Throwable $th) {
                //throw $th;
            }
            
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $imgresize = Image::make($image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('upload/products/thambnail/'.$name_gen);
            $last_img = 'upload/products/thambnail/'.$name_gen;
    
            Product::findOrFail($pro_id)->update([
               'product_thambnail' => $last_img,
               'updated_at' => Carbon::now(),
    
            ]);
        }
        
        $notification = array(
           'message' => 'Product Image Thambnail Updated Successfully',
           'alert-type' => 'info'
       );
       return redirect()->back()->with($notification);
    } // end method

    //// Multi Image Delete ////
    public function MultiImageDelete($id){
        $oldimg = MultiImg::findOrFail($id);
        try {
            unlink($oldimg->photo_name);
        } catch (\Throwable $th) {
            //throw $th;
        }
        MultiImg::findOrFail($id)->delete();
        $notification = array(
           'message' => 'Product Image Deleted Successfully',
           'alert-type' => 'success'
       );
       return redirect()->back()->with($notification);
    } // end method

    public function ProductInactive($id){
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
           'message' => 'Product Inactive',
           'alert-type' => 'success'
       );
       return redirect()->back()->with($notification);
    }


    public function ProductActive($id){
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
           'message' => 'Product Active',
           'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ProductDelete($id){
        $product = Product::findOrFail($id);
        try {
            unlink($product->product_thambnail);
        } catch (\Throwable $th) {
            //throw $th;
        }
        
        Product::findOrFail($id)->delete();

        $images = MultiImg::where('product_id',$id)->get();
        foreach ($images as $img) {
            try {
                unlink($img->photo_name);
            } catch (\Throwable $th) {
                //throw $th;
            }
            MultiImg::where('product_id',$id)->delete();
        }

        $notification = array(
           'message' => 'Product Deleted Successfully',
           'alert-type' => 'success'
       );
       return redirect()->back()->with($notification);
    }// end method 
}
