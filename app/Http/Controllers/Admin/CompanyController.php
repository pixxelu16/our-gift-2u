<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\PurchagedGiftCard;

use Carbon\Carbon;

class CompanyController extends Controller
{
    //Function for get all comnpany list
    public function all_company(){
        $all_company = User::orderBy('id', 'DESC')->where('user_type', 'Company')->get();

        return view('admin.company.all-company-list', compact('all_company'));
    }

    //Function for get all company purchased gift cards
    public function all_purchased_gift_cards(){
        //Get purchased all gift card list
        $purchased_gift_card_list = PurchagedGiftCard::Orderby('id', 'DESC')->with('gift_card_detail')->get(); 

        return view('admin.company.all-purchased-gift-cards', compact('purchased_gift_card_list'));
    }

    //Function for get purchased gift card detail
    public function purchased_gift_card_detail(Request $request){
        //Get Request
        $purchased_id = $request->purchased_id;
        //Get purchased all gift card details
        $purchased_gift_card_detail = PurchagedGiftCard::Where('id', $purchased_id)->with('user_detail','gift_card_detail','coupon_code_list')->first();

       //echo "<pre>"; print_r($purchased_gift_card_detail->toArray()); exit;
        //Check if order exit or not
        if($purchased_gift_card_detail) { ?>
            <div class="order">
                <div class="odrer-list-box-one">
                        <ul>
                            <li>
                                <div class="box-left-list">
                                    <span>Gift Card Name:</span>
                                </div>
                                <div class="box-right-list">
                                    <span class="price">
                                        <?php echo $purchased_gift_card_detail->gift_card_detail->name ?? ""; ?>
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div class="box-left-list">
                                    <span>Payment Method:</span>
                                </div>
                                <div class="box-right-list">
                                    <?php echo $purchased_gift_card_detail->payment_method_type; ?>
                                </div>
                            </li>
                            <li>
                                <div class="box-left-list">
                                    <span>Payment Status:</span>
                                </div>
                                <div class="box-right-list">
                                    <span><?php echo $purchased_gift_card_detail->payment_status; ?></span>
                                </div>
                            </li>
                            <li>
                                <div class="box-left-list">
                                    <span>Transaction ID:</span>
                                </div>
                                <div class="box-right-list">
                                    <span><?php echo $purchased_gift_card_detail->trasaction_id; ?></span>
                                </div>
                            </li>
                            <li>
                                <div class="box-left-list">
                                    <span>Grand Total:</span>
                                </div>
                                <div class="box-right-list">
                                    <span class="price">$ <?php echo $purchased_gift_card_detail->order_amount; ?></span>
                                </div>
                            </li>
                            <li>
                                <div class="box-left-list">
                                    <span>Placed Time:</span>
                                </div>
                                <div class="box-right-list">
                                    <span><?php echo Carbon::parse($purchased_gift_card_detail->created_at); ?></span>
                                </div>
                            </li>
                        </ul>
                </div>
                <div class="order-items coupon-code-scroll">
                    <h4>Coupon Code List</h4>
                    <table class="table">
                        <thead> 
                            <tr>
                            <th>Sr.</th>
                            <th>Coupon Code</th>
                            <th>Price</th>
                            <th>Expire Date</th>
                            <th>Is Used</th>
                            </tr>
                        </thead> 
                        <tbody> 
                        <?php 
                            $coupon_code_count = 1;
                            foreach($purchased_gift_card_detail->coupon_code_list as $key => $coupon_code) { ?>
                            <tr>
                                <td><?php echo $coupon_code_count; ?></td>
                                <td><?php echo $coupon_code->code; ?></td>
                                <td>$<?php echo $coupon_code->price; ?></td>
                                <td><?php echo Carbon::parse($coupon_code->expire_date)->format('F j, Y'); ?></td>
                                <td><?php echo $coupon_code->is_used; ?></td>
                            </tr>
                        <?php $coupon_code_count++; } ?>
                    </tbody>
                  </table>
                </div>
            </div>
        <?php  } else {
            echo '<p style="color:red;">No Purchased Gift Card Found.</p>';
        }
    }
    
}
