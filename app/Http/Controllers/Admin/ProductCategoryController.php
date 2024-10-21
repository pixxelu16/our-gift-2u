<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Mail;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCatRelation;
use App\Models\Attachment;
use Carbon\Carbon;

class ProductCategoryController extends Controller
{
    //function for add new  category
    public function add_new_product_category(){
        $all_category = ProductCategory::orderBy('id', 'DESC')->WhereIn('parent_category', [0])->Where('status', 'Active')->get();
        $all_products = Product::orderBy('id', 'DESC')->Where('status', 'Active')->get();

        $view =  view('admin.products.add-product-category', compact('all_category','all_products'));
        return $view;
    }

    //function for all category list
    public function all_product_categories(){
        $all_category = ProductCategory::orderBy('id', 'DESC')->WhereIn('parent_category', [0])->with('sub_category_list')->get();
        //echo "<pre>"; print_r($all_category->toArray()); exit; 
        $view =  view('admin.products.all-product-category', compact('all_category'));
        return $view;
    }

    //function for sumit product category
    public function submit_product_category(Request $request){
        //If category Image 
        $category_image  = "default-image.jpeg";
        if($request->hasFile('image')){ 
            $category_image = 'category_'.time().rand(1,50).'.'.$request->file('image')->extension();
            $request->file('image')->move('public/uploads/category/', $category_image);  
        }

        //insert Query
        $insert = ProductCategory::create([
            'name' => $request->category_name,
            'slug' => Str::slug($request->category_name, "-"),
            'description' => $request->description,
            'short_description' => $request->short_description,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'parent_category' => $request->parent_category,
            'status' => $request->status,
            'image' => $category_image,
        ]);
                
        //Check if data is insert or not
        if($insert){
            return back()->with('success','Category has been created successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }
        
    }

    //function for edit category
    public function edit_product_category($id){
        $category = ProductCategory::Where('id',$id)->first();
        $all_category = ProductCategory::orderBy('id', 'DESC')->WhereIn('parent_category', [0])->Where('status', 'Active')->get();
        $all_products = Product::orderBy('id', 'DESC')->Where('status', 'Active')->get();
       // echo "<pre>"; print_r($category->ToArray()); exit;
        $view =  view('admin.products.edit-product-category', compact('category','all_category','all_products'));
        return $view;
    }

    //function for update category
    public function update_product_category(Request $request, $id){
        //If category Image 
        if($request->hasFile('image')){ 
            $category_image = 'category_'.time().rand(1,50).'.'.$request->file('image')->extension();
            $request->file('image')->move('public/uploads/category/', $category_image);  

            //update Query
            $update = ProductCategory::Where('id', $id)->update([
                'name' => $request->category_name,
                'description' => $request->description,
                'short_description' => $request->short_description,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'parent_category' => $request->parent_category,
                'image' => $category_image,
                'status' => $request->status,
            ]);

            //Check if data is update or not
            if($update){ 
                return back()->with('success','Category has been updated successfully.');
            } else {
                return back()->with('unsuccess','Opps Something wrong. Please try Again.');
            }
        } else {
            //update Query
            $update = ProductCategory::Where('id', $id)->update([
                'name' => $request->category_name,
                'description' => $request->description,
                'short_description' => $request->short_description,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'parent_category' => $request->parent_category,
                'status' => $request->status
            ]);

            //Check if data is update or not
            if($update){ 
                return back()->with('success','Category has been updated successfully.');
            } else {
                return back()->with('unsuccess','Opps Something wrong. Please try Again.');
            }
        }
    }

    //function for delete category
    public function delete_product_category ($id){
        $is_category_delete = ProductCategory::Where('id', $id)->delete();
        //Check if category is deleted or not
        if($is_category_delete){
            //Delete other category data
            ProductCatRelation::Where('category_id', $id)->delete();
            return back()->with('success','Category has been deleted successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }
    }


    //Function for delete attachment category
    public function delete_attach_category($id){
    //get attachment
    $category_attachment = Attachment::find($id);
    //get image path
    $imagepath = public_path('uploads/category/' . $category_attachment->file_name);
        //check if attachment is exist or not folder
        if(file_exists($imagepath) && is_file($imagepath)){
            //delete attachment is folder
            unlink($imagepath);
            $category_attachment->delete();
            return back()->with('success', 'Attachment deleted successfully..');      
        } else {
            //delete attachment db
            $category_attachment->delete();  
            return back()->with('success', 'Attachment deleted successfully..'); 
        }
    }

    //Function for delete category image
    public function delete_category_image($id){
        //get image
        $category_image = CategoryImagesRelation::find($id);
        //get image path
        $imagepath = public_path('uploads/category-images/' . $category_image->image);
        //check if image is exist or not folder
        if(file_exists($imagepath) && is_file($imagepath)){
            //delete image is folder
            unlink($imagepath);
            $category_image->delete();
            return back()->with('success', 'Image deleted successfully..');      
        } else {
            //delete image db
            $category_image->delete();  
            return back()->with('success', 'Image deleted successfully..'); 
        }
    }
  
}