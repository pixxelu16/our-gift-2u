<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

class CustomerUserController extends Controller
{
    //Function to add new customer 
    public function add_new_customer(){
        return view('admin.customer-users.add-customer');
    }

    //Function for submit customer
    public function submit_customer(Request $request){
        //validation rule
        request()->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Create the user
        $created_user = User::create([
            'name' => $request->input('first_name') . ' ' . $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'mobile' => $request->input('mobile'),
            'user_type' => $request->input('user_type'),
            'user_status' => $request->input('user_status'),
        ]);

        // Log in the user
        if ($created_user) {
            return back()->with('success', 'New customer added sucessfully.');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong.');
        }
    }

    //Function for get all customer users list
    public function customer_users(){
    $all_customer_users = User::orderBy('id', 'DESC')->where('user_type', 'Customer')->get();
        return view('admin.customer-users.all-customers-list', compact('all_customer_users'));
    }

    //Function for edit customer 
    public function edit_customer($id){
    $customer = User::find($id);
        return view('admin.customer-users.edit-customer', compact('customer'));
    }

    //Function for udpate customer
    public function update_customer(Request $request, $id){
        $update_customer = User::where('id', $id)->update([
            'name' => $request->first_name." ".$request->last_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile' => $request->mobile,
            'user_type' => $request->user_type,
            'user_status' => $request->user_status,
        ]);
        //check if customer user update or not
        if($update_customer){
            return back()->with('success', 'Customer detail updated sucessfully.');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong.');
        }
    }

    //Function for delete customer
    public function delete_customer($id){
    $delete_customer = User::where('id', $id)->delete();
        //check if customer is delete or not
        if($delete_customer){
            return back()->with('success', 'Customer detail deleted sucessfully.');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong.');
        }
    }
}
