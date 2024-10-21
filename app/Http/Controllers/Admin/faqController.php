<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Faq;

class faqController extends Controller
{
   public function view_faq(){
        return view('admin.faq.add-new');
   }

   //function for submit faq
   public function submit_faq(Request $request){

        request()->validate([
            'title' => 'required', 'string',
            'description' => 'required', 'string',
        ]);

        //insert Query
        $insert = Faq::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        //Check if data is insert or not
        if($insert){  
            return back()->with('success','Faq has been created successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }
   }

   //Function for get all faq 
   public function all_faqs_list(){
    $get_faq_lists = Faq::all();
        return view('admin.faq.all-faqs', compact('get_faq_lists')); 
   }

   //Funtion for edit faq
   public function edit_faq($id){
    $faqs = Faq::find($id);
        return view('admin.faq.edit-faq', compact('faqs'));
   }
   
   //Function for update faq
   public function update_faq(Request $request, $id){
    //update faq
    $update_faq = Faq::where('id', $id)->update([
        'title' => $request->title,
        'description' => $request->description,
    ]);
        //Check if faq data is updated or not
        if($update_faq){  
            return back()->with('success','Faq has been updated successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }
   }

   //Function for delete faq
   public function delete_faq($id){
    $delete_faqs = faq::where('id', $id)->delete();
        //Check if faq data is deleted or not
        if($delete_faqs){  
            return back()->with('success','Faq has been deleted successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }
    }
}
