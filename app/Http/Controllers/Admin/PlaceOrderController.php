<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PlaceOrder;

class PlaceOrderController extends Controller
{
    //Function for show all Place Orders
    public function all_place_orders(){
        //Get All Place Orders
        $all_place_orders = PlaceOrder::Orderby('id', 'DESC')->get();

        return view('admin.category-place-orders.all-place-orders', compact('all_place_orders'));
    }

    //Function for add Place Order
    public function add_place_order(){
        return view('admin.category-place-orders.add-place-order');
    }

    //Function for submit Place Order
    public function submit_place_order(Request $request){
        //Check if image is exit or not
        $filename = "default.png";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move(public_path('uploads/category-place-orders'), $filename);
        }

        //Create Place Order
        $insert_largest_canvas = PlaceOrder::create([
            'name' =>$request->name,
            'desc' =>$request->desc,
            'status' =>$request->status,
            'image' =>$filename,
        ]);   

        //Check if Place Order data is inserted or not
        if($insert_largest_canvas){  
            return back()->with('success','Place Order Created Successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }
    }

    //Function for edit Place Order
    public function edit_place_order($id){
        //Larget Place Order detail
        $place_order_detail = PlaceOrder::find($id);

        return view('admin.category-place-orders.edit-place-order', compact('place_order_detail'));
    }

    //Function for update Place Order
    public function update_place_order(Request $request, $id){   
        //Check if image is exit or not
        if($request->hasFile('image')) {        
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/category-place-orders'), $filename);
        
            //Update Place Order with image
            $update_category_banner = PlaceOrder::where('id', $id)->update([
                'name' =>$request->name,
                'desc' =>$request->desc,
                'status' =>$request->status,
                'image' =>$filename,
            ]); 

            //Check if Place Order data is updated or not
            if($update_category_banner){  
                return back()->with('success','Place Order Updated Successfully.');
            } else {
                return back()->with('unsuccess','Opps Something wrong. Please try Again.');
            }
        } else {
            //Update Place Order without image
            $update_category_banner = PlaceOrder::where('id', $id)->update([
                'name' =>$request->name,
                'desc' =>$request->desc,
                'status' =>$request->status,
            ]);

            //Check if Place Order data is updated or not
            if($update_category_banner){  
                return back()->with('success','Place Order Updated Successfully.');
            } else {
                return back()->with('unsuccess','Opps Something wrong. Please try Again.');
            }
        }
    }

    //Function For delete Place Order
    public function delete_place_order($id) {   
        //Delete Place Order
        $is_deleted = PlaceOrder::Where('id',$id)->delete(); 
        //Check if Place Order is deleted or not
        if($is_deleted){ 
            return back()->with('success','Place Order Updated Successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }
    }
}
