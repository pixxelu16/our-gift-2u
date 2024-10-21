<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Mail;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductCategory;
use App\Models\ProductCatRelation;
use App\Models\CanvasShapes;
use App\Models\ProductSize;
use App\Models\ProductShape;
use App\Models\Shipping;
use Carbon\Carbon;

class ProductController extends Controller
{
    //function for all products list
    public function all_products(){
        $all_products = Product::orderBy('id', 'DESC')->get();
       
        $view =  view('admin.products.all-products', compact('all_products'));
        return $view;
    }

    //function for add new product
    public function add_new_product(){
        $all_category = ProductCategory::Where('status', 'Active')->get();
        $shipping_price = Shipping::get();
        $view =  view('admin.products.add-product', compact('all_category','shipping_price'));
        return $view;
    }

    //function for sumit product
    public function submit_product(Request $request){ 
        //validation rule
        request()->validate([
            'product_name' => 'required', 'string', 'max:255',
            'product_sku' => 'required', 'string', 'max:255',
            'product_price' => 'required', 'string', 'max:255',
            'product_cost' => 'required', 'string', 'max:255',
            'manufacturer_email' => 'required', 'string', 'max:255',
            'product_quantity' => 'required', 'string', 'max:255',
            'pre_order_capacity' => 'required', 'string', 'max:255',
        ]);
        // Check if the SKU already exists
        $is_product_sku_exist = Product::Where('product_sku', $request->product_sku)->count();
        // If the SKU exists, regenerate it
        if($is_product_sku_exist >= 1) {
            return back()->with('unsuccess','This sku number is already exists. Please try again.');
        } else {
            //If product feature Image is exit or not
            $product_image  = "default.png";
            if($request->hasFile('image')){ 
                $product_image = 'product_'.time().rand(1,50).'.'.$request->file('image')->extension();
                $request->file('image')->move('public/uploads/products/', $product_image) ;  
            }


            //insert Query
            $product_insert = Product::create([
                'product_name' => $request->product_name,
                'product_slug' => Str::slug($request->product_name, "-"),
                'description' => $request->description,
                'short_description' => $request->short_description,
                'product_sku' => $request->product_sku,
                'factory_id' => $request->factory_id,
                'barcode_number' => $request->barcode_number,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'product_price' => $request->product_price,
                'product_cost' => $request->product_cost,
                'manufacturer_email' => $request->manufacturer_email,
                'product_quantity' => $request->product_quantity,
                'pre_order_capacity' => $request->pre_order_capacity,
                'min_order_capacity' => $request->min_order_capacity,
                'image' => $product_image,
                'status' => $request->status,
                'technical_details' => $request->technical_details,
                'is_featured' => $request->is_featured,
                'shipping_price' => $request->shipping_price,
                'is_home' => $request->is_home,
                'is_banner_one' => $request->is_banner_one,
                'is_banner_two' => $request->is_banner_two,
            ]);

            //Check if data is insert or not
            if($product_insert){  
                //Check if assign category 
                if(count($request->product_category_ids) >= 1){
                    foreach($request->product_category_ids as $category){
                        //Insert category relation
                        ProductCatRelation::create(['product_id' => $product_insert->id, 'category_id' => $category]);
                    }
                }

                //Check if product multiple images exits
                if($request->hasFile('multiple_image')){ 
                    foreach ($request->multiple_image as $file) {
                        $image_full_name = 'product_'.time().rand(1,50).'.'.$file->extension();
                        $file->move('public/uploads/products/', $image_full_name);

                        //Insert product image
                        ProductImage::create(['product_id' => $product_insert->id, 'image' => $image_full_name]);
                    }
                }

                return back()->with('success','Product has been created successfully.');
            } else {
                return back()->with('unsuccess','Opps Something wrong. Please try Again.');
            }
        }
    }

    //function for edit product
    public function edit_product($id){
        $product_detail = Product::Where('id', $id)->with('product_category','product_image')->first();
        $all_category = ProductCategory::Where('status', 'Active')->get();
        $shipping_price = Shipping::get();
       // echo "<pre>"; print_r($product_detail); exit;  

        $view =  view('admin.products.edit-product', compact('product_detail','all_category','shipping_price'));
        return $view;
    }

    //function for update product
    public function update_product(Request $request, $id){ 
        //validation rule
        request()->validate([
            'product_name' => 'required', 'string', 'max:255',
            'product_price' => 'required', 'string', 'max:255',
            'product_cost' => 'required', 'string', 'max:255',
            'manufacturer_email' => 'required', 'string', 'max:255',
            'product_quantity' => 'required', 'string', 'max:255',
            'pre_order_capacity' => 'required', 'string', 'max:255',
        ]);

        //If product feature Image is exit or not
        $product_image  = "default.png";
        if($request->hasFile('image')){ 
            $product_image = 'product_'.time().rand(1,50).'.'.$request->file('image')->extension();
            $request->file('image')->move('public/uploads/products/', $product_image);  

            //Update Query
            $update_product = Product::Where('id', $id)->update([
                'image' => $product_image,
            ]);
        }

        //Check if product multiple images exits
        if($request->hasFile('multiple_image')){ 
            foreach ($request->multiple_image as $file) {
                $image_full_name = 'product_'.time().rand(1,50).'.'.$file->extension();
                $file->move('public/uploads/products/', $image_full_name);

                //Insert product image
                ProductImage::create(['product_id' => $id, 'image' => $image_full_name]);
            }
        }
        //Update Query for product
        $update_product = Product::Where('id', $id)->update([
                                    'product_name' => $request->product_name,
                                    'factory_id' => $request->factory_id,
                                    'barcode_number' => $request->barcode_number,
                                    'description' => $request->description,
                                    'short_description' => $request->short_description,
                                    'meta_title' => $request->meta_title,
                                    'meta_description' => $request->meta_description,
                                    'product_price' => $request->product_price,
                                    'product_cost' => $request->product_cost,
                                    'manufacturer_email' => $request->manufacturer_email,
                                    'product_quantity' => $request->product_quantity,
                                    'pre_order_capacity' => $request->pre_order_capacity,
                                    'min_order_capacity' => $request->min_order_capacity,
                                    'status' => $request->status,
                                    'technical_details' => $request->technical_details,
                                    'is_featured' => $request->is_featured,
                                    'shipping_price' => $request->shipping_price,
                                    'is_home' => $request->is_home,
                                    'is_banner_one' => $request->is_banner_one,
                                    'is_banner_two' => $request->is_banner_two,
                                ]);

        //Check if data is updated or not
        if($update_product){  
            //Delete old category ids
            ProductCatRelation::Where('product_id',$id)->delete(); 
            //Check if assign category 
            if(count($request->product_category_ids) >= 1){
                foreach($request->product_category_ids as $category){
                    //Insert category relation
                    ProductCatRelation::create(['product_id' => $id, 'category_id' => $category]);
                }
            }

            return back()->with('success','Product has been updated successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }
    }

    //function for delete product
    public function delete_product($id){
        $is_product_delete = Product::Where('id', $id)->delete();

        //Check if product is deleted or not
        if($is_product_delete){
            //Delete other product data
            ProductCatRelation::Where('product_id', $id)->delete();
            ProductImage::Where('product_id', $id)->delete();

            return back()->with('success','Product has been deleted successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }
    }

    //Function for delete product attachment
    public function delete_attach_category($id){
        //get attachment
        $product_attachment = ProductImage::find($id);
        //get image path
        $imagepath = public_path('uploads/products/' . $product_attachment->file_name);
        //check if attachment is exist or not folder
        if(file_exists($imagepath) && is_file($imagepath)){
            //delete attachment is folder
            unlink($imagepath);
            $product_attachment->delete();
            return back()->with('success', 'Attachment deleted successfully..');      
        } else {
            //delete attachment db
            $product_attachment->delete();  
            return back()->with('success', 'Attachment deleted successfully..'); 
        }
    }
}