<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactUsEmail; 

use App\Models\BrandLogos;

class ContactUsController extends Controller
{
    //Function for Show contact us page
    public function contact_us(){
        $logos = BrandLogos::Where('type', 'Logo')->get()->ToArray();

        return view('contact-us', compact('logos'));
    }

    //Function for submit contact form
    public function submit_contact_us(Request $request){
        //Mail data
        $MailData = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'message' => $request->message,
        ];
        //Send Email 
        $admin_email = env('ADMIN_EMAIL_ADDRESS') ?? "";
        $send_email = Mail::to($admin_email)->send(new ContactUsEmail($MailData));
        if($send_email){
            echo '<p style="color:green;">Thank you for contacting us we will get back to you shortly.</p>';
            echo '<script>setTimeout(function() { window.location.href = ""; }, 3000);</script>';
        } else {
            echo '<p style="color:Red;">Oops something wrong.</p>';
        }
    }
}