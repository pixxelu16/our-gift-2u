<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\ProductReview;

class ProductReviewsController extends Controller
{
    //Function to submit rating and review
    public function submit_rating(Request $request) {
        //echo "<pre>"; print_r($request->all()); exit;  
        $rating = $request->rating;
        $review = $request->review;
        $product_id =$request->product_id;
        $user_id = Auth::id();
        $ratings = implode(',', $rating);
        $postdata = ProductReview::create([
                    'rating' => $ratings,
                    'desc' => $review,
                    'product_id' => $product_id,
                    'user_id' => $user_id,
                    ]);      
        //check if data posted or not
        if($postdata){
            echo '<p style="color:green;">Your Rating submitted successfully.</p>';
        }
        else { 
           echo '<p style="color:red;">Opps Something wrong!</p>';
        }
    }
}
