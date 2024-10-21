<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipping;
use App\Models\OtherSetting;
use Illuminate\Support\Facades\Auth; 

class ShippingController extends Controller
{
    //function for add new shipping
    public function add_new_shipping(){
        return view('admin.shipping.add-new');
    }

    //function for submit shipping
    public function submit_shipping(Request $request){
        // Validate the request
        $request->validate([
            'shipping_amount' => 'required|string|max:255',
        ]);

        //insert query
        $shipping = Shipping::create([
            'shipping_amount' => $request->shipping_amount,
        ]);

        //check insert or not
        if($shipping){
            return redirect()->back()->with('success', 'Shipping Added Successfully');
        } else {
            return redirect()->back()->with('unsuccess', 'Failed to Add Shipping');
        }
    }

    //function for all show all list
    public function all_listing(){
      $all_records = Shipping::all();
      return view('admin.shipping.all-shipping', compact('all_records'));
    }

    //function foe edit shipping
    public function edit_shipping(Request $request, $id){
        $record = Shipping::where('id', $id)->first();
        return view('admin.shipping.edit-shipping', compact('record'));
    }

    //function for update shipping
    public function update_shipping(Request $request, $id){
         
        $request->validate([
            'shipping_amount' => 'required|string|max:255',
        ]);
        //update query
        $update_record = Shipping::where('id', $id)->update([
            'shipping_amount' => $request->shipping_amount,
        ]);
     
        //check insert or not
        if($update_record){
            return redirect()->back()->with('success', 'Shipping Data Updated Successfully');
        } else {
            return redirect()->back()->with('unsuccess', 'Failed to Update Shipping Data');
        }
    }

    //function for delete
    public function delete_shipping($id) {
        // Try to find the shipping record by ID and delete it
        $delete_record = Shipping::find($id);
        if ($delete_record) {
            // Delete the record
            $delete_record->delete();
            return redirect()->back()->with('success', 'Shipping record deleted successfully.');
        } else {
            return redirect()->back()->with('unsuccess', 'Failed to delete shipping record.');
        }
    }

    //function for add other setting
    public function add_other_setting(){
        $user_id = Auth::id();
        $record = OtherSetting::where('user_id',$user_id)->first();
        return view('admin.shipping.add-other-setting',compact('record'));
    }

    //function for submit other setting
    public function submit_other_setting(Request $request){
        $adminFee = $request->input('admin_fee');
        $insuranceFee = $request->input('insurance_fee');
        $tax = $request->input('tax');
        //get user id
        $user_id = Auth::id();
        $update_or_create = OtherSetting::updateOrCreate(
            ['user_id' => $user_id], 
            [
                'user_id' => $user_id,
                'admin_fee' => $adminFee,
                'insurance_fee' => $insuranceFee,
                'tax' => $tax,
        ]);
        //check if created or update show message
        if($update_or_create){
            return redirect()->back()->with('success', 'Data Updated Successfully');
        } else {
            return redirect()->back()->with('unsuccess', 'Data Updated Successfully');
        }
    }
}
