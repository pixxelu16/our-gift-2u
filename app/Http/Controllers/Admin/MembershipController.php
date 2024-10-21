<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Membership;

class MembershipController extends Controller
{
    //Function For all membership
    public function all_membership(){
        $all_memberships = Membership::get();
        return view('admin.membership.all-memberships', compact('all_memberships'));
    }

    //Function For add membership
    public function add_membership(){
        return view('admin.membership.add-membership');
    }

    //function for sumit membership
    public function submit_membership(Request $request){ 
        //insert Query
        $membership_insert = Membership::create([
            'name' => $request->name,
            'monthly_spend' => $request->monthly_spend,
            'rewards_points' => $request->rewards_points,
            'membership_cost_per_year' => $request->membership_cost_per_year,
            'revenue' => $request->revenue,
            'price' => $request->price,
            'membership_type' => $request->membership_type,
            'is_home' => $request->is_home,
            'status' => $request->status
        ]);

        //Check if data is insert or not
        if($membership_insert){  
            return back()->with('success','Membership has been created successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }
    }

    //Function For add membership
    public function edit_membership($id){
        $membership_detail = Membership::Where('id',$id)->first();

        return view('admin.membership.edit-memberships', compact('membership_detail'));
    }

    //function for update membership
    public function update_membership(Request $request, $id){ 
        //insert Query
        $membership_update = Membership::Where('id', $id)->update([
            'name' => $request->name,
            'monthly_spend' => $request->monthly_spend,
            'rewards_points' => $request->rewards_points,
            'membership_cost_per_year' => $request->membership_cost_per_year,
            'revenue' => $request->revenue,
            'price' => $request->price,
            'membership_type' => $request->membership_type,
            'is_home' => $request->is_home,
            'status' => $request->status
        ]);

        //Check if data is updated  or not
        if($membership_update){  
            return back()->with('success','Membership has been updated successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }
    }

     //function for delete membership
     public function delete_membership($id){
        $is_membership_delete = Membership::Where('id', $id)->delete();

        //Check if Membership is deleted or not
        if($is_membership_delete){
            return back()->with('success','Membership has been deleted successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }
    }
}
