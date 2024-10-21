<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    //add team member
    public function add_team_member(){
        $view =  view('admin.teams.add-team');
        return $view;
    }

    //function for all member list
    public function all_members(){
        $all_member = Team::orderBy('id', 'DESC')->get();  
        $view =  view('admin.teams.all-team-member', compact('all_member'));
        return $view;
    }

    //submit team member
    public function submit_team_member(Request $request){ 
        //validation rule
        request()->validate([
            'name' => 'required', 'string', 'max:255',
            'description' => 'required', 'string', 'max:5000',
            'designation' => 'required', 'string', 'max:255',
            'profile_image' => 'required', 'string', 'max:255',
        ]);

        $member_image  = "default.png";
        if($request->hasFile('profile_image')){ 
            $member_image = 'teams_'.time().rand(1,50).'.'.$request->file('profile_image')->extension();
            $request->file('profile_image')->move('public/uploads/teams/', $member_image) ;  
        }
        //insert Query
        $member_insert = Team::create([
            'name' => $request->name,
            'description' => $request->description,
            'designation' => $request->designation,
            'profile_image' => $member_image,
            'status' => $request->status,
        ]);

        //check 
        if($member_insert){   
         return back()->with('success','Member has been created successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }
    }

    //edit team member
    public function edit_member($id){
        $member_detail = Team::Where('id', $id)->first();
        $view =  view('admin.teams.edit-team', compact('member_detail'));
        return $view;
    }

    //update team member
    public function update_team_member(Request $request, $id){
        //validation rule
        request()->validate([
            'name' => 'required', 'string', 'max:255',
            'description' => 'required', 'string', 'max:5000',
            'designation' => 'required', 'string', 'max:255',
        ]);

        if($request->hasFile('profile_image')){ 
            $member_image = 'teams_'.time().rand(1,50).'.'.$request->file('profile_image')->extension();
            $request->file('profile_image')->move('public/uploads/teams/', $member_image) ;  
            //update Query
            $member_update = Team::where('id', $id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'designation' => $request->designation,
                'profile_image' => $member_image,
                'status' => $request->status,
            ]);
            //check 
            if($member_update){   
                return back()->with('success','Member has been created successfully.');
            } else {
                return back()->with('unsuccess','Opps Something wrong. Please try Again.');
            }
        } else {
            //update Query
            $member_update = Team::where('id', $id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'designation' => $request->designation,
                'status' => $request->status,
            ]);
            //check 
            if($member_update){   
                return back()->with('success','Member has been created successfully.');
            } else {
                return back()->with('unsuccess','Opps Something wrong. Please try Again.');
            }
        }
    }

    // Delete team member
    public function delete_team_member($id) {
        $member = Team::find($id);

        // Check if the member exists
        if ($member) {
            // Get image path
            $imagePath = public_path('uploads/teams/' . $member->profile_image);

            // Check if the image file exists and is a file, then delete it
            if (file_exists($imagePath) && is_file($imagePath)) {
                unlink($imagePath);
            }
            // Delete the member from the database
            $member->delete();
            return back()->with('success', 'Member deleted successfully.');
        } else {
            return back()->with('unsuccess', 'Member not found.');
        }
    }

}
