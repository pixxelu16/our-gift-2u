<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BrandLogos;

class BrandsLogosController extends Controller
{
    //Function For all brand_and_logos
    public function all_brand_and_logos(){
        $all_brand_and_logos = BrandLogos::get();
        return view('admin.brand-and-logos.all-brand-and-logos', compact('all_brand_and_logos'));
    }

    //Function For add brand_and_logos
    public function add_brand_and_logos(){
        return view('admin.brand-and-logos.add-brand-and-logos');
    }

    //function for sumit brand_and_logos
    public function submit_brand_and_logos(Request $request){ 
        //If main_image is exit or not
        $main_image  = "default.png";
        if($request->hasFile('main_image')){ 
            $main_image = 'main_image_'.time().rand(1,50).'.'.$request->file('main_image')->extension();
            $request->file('main_image')->move('public/uploads/brands-logos/', $main_image) ;  
        }

        //If main_image is exit or not
        $logo  = "default.png";
        if($request->hasFile('logo')){ 
            $logo = 'logo_'.time().rand(1,50).'.'.$request->file('logo')->extension();
            $request->file('logo')->move('public/uploads/brands-logos/', $logo) ;  
        }
 
        //insert Query   
        $brand_and_logos_insert = BrandLogos::create([
            'name' => $request->name,
            'main_logo' => $main_image,
            'logo' => $logo,
            'is_home' => $request->is_home,
            'type' => $request->type,
            'status' => $request->status
        ]);

        //Check if data is insert or not
        if($brand_and_logos_insert){  
            return back()->with('success','Brand and logos has been created successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }
    }

    //Function For edit brand_and_logos
    public function edit_brand_and_logos($id){
        $brand_and_logos_detail = BrandLogos::Where('id',$id)->first();

        return view('admin.brand-and-logos.edit-brand-and-logos', compact('brand_and_logos_detail'));
    }

     //function for update brand_and_logos
     public function update_brand_and_logos(Request $request, $id){ 
         //If main_image is exit or not
         $main_image  = "default.png";
         if($request->hasFile('main_image')){ 
             $main_image = 'main_image_'.time().rand(1,50).'.'.$request->file('main_image')->extension();
             $request->file('main_image')->move('public/uploads/brands-logos/', $main_image) ; 
             
            //Update Query
            BrandLogos::Where('id', $id)->update(['main_logo' => $main_image]);
         }
 
         //If main_image is exit or not
         $logo  = "default.png";
         if($request->hasFile('logo')){ 
            $logo = 'logo_'.time().rand(1,50).'.'.$request->file('logo')->extension();
            $request->file('logo')->move('public/uploads/brands-logos/', $logo) ; 
             
            //Update Query
            BrandLogos::Where('id', $id)->update(['logo' => $logo]);
         }

        //insert Query
        $brand_and_logos_update = BrandLogos::Where('id', $id)->update([
            'name' => $request->name,
            'is_home' => $request->is_home,
            'type' => $request->type,
            'status' => $request->status 
        ]);

        //Check if data is updated  or not
        if($brand_and_logos_update){  
            return back()->with('success','Brand and logos has been updated successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }
    }

    //function for delete brand_and_logos
    public function delete_brand_and_logos($id){
        $is_brand_and_logos_delete = BrandLogos::Where('id', $id)->delete();

        //Check if brand_and_logos is deleted or not
        if($is_brand_and_logos_delete){
            return back()->with('success','Brand and logos has been deleted successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }
    }
}
