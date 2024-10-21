<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Testimonial;

class TestimonialController extends Controller
{
    //Function for show all testimonials lists
    public function all_testimonials() {
    $all_testimonial_lists = Testimonial::Orderby('id', 'DESC')->get();
        return view('admin.testimonials.all-testimonials-list', compact('all_testimonial_lists'));    
    }

    //Function for add testimonial 
    public function add_testimonial() {
        return view('admin.testimonials.add-new-testimonial');
    }

    //Function for submit testimonial
    public function submit_testimonial(Request $request) {
        //create testimonial
        $create_testimonial = Testimonial::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'rating' => $request->rating,
            'status' => $request->status,
            'custom_date' => $request->custom_date,
            'is_home' => $request->is_home,
        ]);
        //check if testimonial is created or not
        if($create_testimonial) {
            return back()->with('success', 'Testimonial detail created successfully.');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong.');
        }
    }

    //Function for edit testimonial
    public function edit_testimonial($id) {
    $testimonials = Testimonial::find($id);
        return view('admin.testimonials.edit-testimonial', compact('testimonials'));
    }

    //Function for update testimonial
    public function update_testimonial(Request $request, $id) {
   
            //update testimonial without image
            $update_testimonial = Testimonial::where('id', $id)->update([
                'name' => $request->name,
                'desc' => $request->desc,
                'rating' => $request->rating,
                'status' => $request->status,
                'custom_date' => $request->custom_date,
                'is_home' => $request->is_home,
            ]);
            //check if testimonial detail updated or not
            if($update_testimonial) {
                return back()->with('success', 'Testimonial detail updated successfully.');
            } else {
                return back()-with('unsucess', 'Opps something went wrong.');
            }
    }

    //Function for delete testimonial
    public function delete_testimonial($id) {
    //get testimonial
    $testimonials = Testimonial::find($id);
            //delete testimonials record wihtout image
    $is_dlelete = $testimonials->delete();
        if($is_dlelete){
            return back()->with('success', 'Testimonial detail deleted successfully.');   
        }  
    }
}
