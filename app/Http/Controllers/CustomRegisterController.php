<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Models\User;
use App\Models\UserPointsLog;
use App\Models\PointsLogList;
use App\Models\CouponCodes;
use App\Models\ReferCode;

class CustomRegisterController extends Controller
{
    //Function to submit Custom Register Form
    public function submit_custom_register(Request $request){
        //Check id email and confirm email is meatched
        if($request['email'] != $request['email_confirmation']){
            echo '<p style="color:red">Email and confirm email is not matched.<p>';
        } elseif($request['password'] != $request['password_confirmation']){
            echo '<p style="color:red">Password and confirm Password is not matched.<p>';
        } else {
            //Check if email is exit or not
            $IsEmailExits = User::where('email',$request['email'])->exists();
            if($IsEmailExits){
                echo '<p style="color:red">Email is already Taken. Please try With new email.<p>';
            } else {
                // Create the user
                $created_user = User::create([
                    'name' => $request->input('first_name') . ' ' . $request->input('last_name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'country' => $request->input('country'),
                    'state' => $request->input('state'),
                    'postal_code' => $request->input('postal_code'),
                    'mobile' => $request->input('mobile'),
                ]);

                // Log in the user
                if ($created_user) {
                    // Trigger email verification
                    event(new Registered($created_user)); 

                    echo '<p style="color:green">Account registration successful. Please check your email inbox to activate your new account.<p>';
                    // Url here
                    $url = url('/login');
                   echo '<script>setTimeout(function() { window.location.href = "'.$url.'"; }, 5000);</script>';
                } else {
                    echo '<p style="color:red">Oops Something Wrong!<p>';
                }
            }
        }
    }

    //Function to submit Company
    public function submit_company(Request $request){
        //Check id email and confirm email is meatched
        if($request['email'] != $request['email_confirmation']){
            echo '<p style="color:red">Email and confirm email is not matched.<p>';
        } elseif($request['password'] != $request['password_confirmation']){
            echo '<p style="color:red">Password and confirm Password is not matched.<p>';
        } else {
            //Check if email is exit or not
            $IsEmailExits = User::where('email',$request['email'])->exists();
            if($IsEmailExits){
                echo '<p style="color:red">Email is already Taken. Please try With new email.<p>';
            } else {
                // Create the user
                $created_user = User::create([
                    'name' => $request->input('contact_person'),
                    'company_name' => $request->input('company_name'),
                    'company_abn' => $request->input('company_abn'),
                    'password' => Hash::make($request->input('password')),
                    'address' => $request->input('address'),
                    'mobile' => $request->input('phone'),
                    'suburb' => $request->input('suburb'),
                    'country' => $request->input('country'),
                    'state' => $request->input('state'),
                    'postal_code' => $request->input('postal_code'),
                    'email' => $request->input('email'),
                    'contact_person' => $request->input('contact_person'),
                    'department' => $request->input('department'),
                    'user_type' => 'Company',
                ]);

                // Log in the user
                if ($created_user) {
                    // Trigger email verification
                    event(new Registered($created_user)); 

                    echo '<p style="color:green">Company registration successful. Please check your email inbox to activate your new account.<p>';
                    // Url here
                    $url = url('/login');
                   echo '<script>setTimeout(function() { window.location.href = "'.$url.'"; }, 5000);</script>';
                } else {
                    echo '<p style="color:red">Oops Something Wrong!<p>';
                }
            }
        }
    }

    //Function to Verify Email Address
    public function verify(Request $request){
        $user = User::find($request->route('id'));
        if ($user->markEmailAsVerified()) {
            $user->user_status = 'Active';
            $user->save();
        }

        return redirect('login')->with('verified', 'Account verified successfully. Please Login..');
    }
}
