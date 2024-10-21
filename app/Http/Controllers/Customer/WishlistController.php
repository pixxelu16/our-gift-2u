<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Wishlist;

class WishlistController extends Controller
{

    //view my wishlist
    public function view_my_wishlist(){
        $wishlists = Wishlist::with('get_wishlist_products')->paginate(6);
        return view('customer.my-wishlist', compact('wishlists'));
    }

    //product add to wishlist
    public function add_to_wishlist(Request $request){
        $product_id = request()->product_id;
        $user_id = Auth::user()->id;
        //insert query
        $add_data = Wishlist::create([
             'user_id' => $user_id,
             'product_id' => $product_id,
        ]);
        //check if product is added to wishlist or not
        if($add_data){
            echo '<p style="color:green">Product added to wishlist.</p>';
            echo '<script>
                    setTimeout(function() {
                        window.location.reload();
                    }, 3000); // Reload the page after 3 seconds (3000 milliseconds)
                  </script>';
        } else {
            echo '<p style="color:red">Failed to add product to wishlist.</p>';
        }
    }

    // remove wishlist product
    public function remove_wishlist_product(Request $request){
        $product_id = request()->product_id;
        $user_id = Auth::user()->id;
        //delete query
        $delete_wishlist = Wishlist::where('user_id', $user_id)->where('product_id', $product_id)->delete();
        // check delete or not
        if($delete_wishlist){
            echo '<p style="color:green">Product Remove from wishlist.</p>';
            echo '<script>
                    setTimeout(function() {
                        window.location.reload();
                    }, 3000);
                  </script>';
        } else {
            echo '<p style="color:red">Failed to Remove product from wishlist.</p>';
        }
    }
}
