<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CouponCodes;

class CouponCodesController extends Controller
{
    //Function For all coupons
    public function all_coupons(){
        $coupons = CouponCodes::get();
        return view('admin.coupons.all-coupons', compact('coupons'));
    }

    //Function For add coupon
    public function add_coupon(){
        return view('admin.coupons.add-coupon');
    }

    //Function for submit coupon
    public function submit_coupon(Request $request){
        //Check if Coupon code is already exsits or not
        $is_coupon_matched = CouponCodes::Where('code',$request->code)->count();
        if($is_coupon_matched >= 1){
            return back()->with('unsuccess','This Coupon Code is Already Exist. Please Try Again With New Coupon Code.');
        } else { 
            //create coupon
            $insert = CouponCodes::create([
                'code' => $request->code,
                'status' => $request->status,
                'expire_date' => $request->expire_date,
                'price' => $request->price,
            ]);

            //if check coupon is insert or not
            if($insert){
                return back()->with('success','Coupon Created Successfully.');
            } else {
                return back()->with('unsuccess','Oops something wrong.');
            }
        }
    }

    //Function For edit coupon
    public function edit_coupon($id){
        $coupons = CouponCodes::find($id);
        return view('admin.coupons.edit-coupon', compact('coupons'));
    }

    //Function for update coupon
    public function update_coupon(Request $request, $id){
        //Update coupon
        $update = CouponCodes::where('id', $id)->update([
            'code' => $request->code,
            'status' => $request->status,
            'expire_date' => $request->expire_date,
            'price' => $request->price,
        ]);

        //if check coupon is update or not
        if($update){
            return back()->with('success','Coupon Updated Successfully.');
        } else {
            return back()->with('unsuccess','Oops something wrong.');
        }
    }

    //Function for delete coupon
    public function delete_coupon($id){
        $delete = CouponCodes::find($id)->delete();

        //if check coupon is delete or not
        if($delete){
            return back()->with('success','Coupon Deleted Successfully.');
        } else {
            return back()->with('unsuccess','Oops something wrong.');
        }
    }
}
