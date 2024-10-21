<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CountryList;
use App\Models\State;
use Carbon\Carbon;

class CountryListController extends Controller
{
    //Function for show states according to country id
    public function get_country_states(Request $request){
        //Get Request
        $country_id = $request->country_id; 
        $state_lists = State::Where('country_id',$country_id)->get()->ToArray();
     
        echo ' <option value="" data-state_id="" selected disabled>Select State</option>';
        foreach ($state_lists as $key => $state) {
            echo ' <option value="'.$state["name"].'" data-state_id="'.$state["id"].'">'.$state["name"].'</option>';
        }
    }
}
