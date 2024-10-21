<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;

use App\Models\Order;
use App\Models\OrderItems;
use App\Models\BillingAddress;
use App\Models\User;

use Illuminate\Support\Facades\Mail;

use Session;
use Exception;
use Carbon\Carbon;

class OrdersController extends Controller {
    
    //Function to get all order list
    public function all_orders(){
        //Get order list Accordiing to order type
        $all_orders = Order::orderBy('id', 'DESC')->with('user')->get()->toArray();

        return view('admin.orders.all-order-list', compact('all_orders'));
    }

    //Function to get all pre order list
    public function all_pre_orders(){
        //Get order list Accordiing to order type
        $all_orders = Order::orderBy('id', 'DESC')->Where('is_order_type', 'pre_order')->with('user')->get()->toArray();

        return view('admin.orders.all-pre-order-list', compact('all_orders'));
    }

    //Function for get order items details
    public function getOrderItems(Request $request){ 
        //Get Request
        $order_id = $request->order_id;
        $order_detail = Order::where('id', $order_id)->with('user','customer_addresses_details','order_items','billing_address')->first()->toArray();

       // echo "<pre>"; print_r($order_detail); exit;
        //Check if order exit or not
        if(count($order_detail) >= 1) { ?>
            <div class="order">
                <div class="order-box-id">
                    <span>Order ID: #<?php echo $order_detail['id']; ?></span>
                </div>
                <div class="odrer-list-box-one">
                    <form action="#" id="update_order_status" method="POST">
                        <input type="hidden" id="order_id" name="order_id" value="<?php echo $order_detail['id']; ?>">
                        <ul>
                            <li>
                                <div class="box-left-list">
                                    <span>Order Type:</span>
                                </div>
                                <div class="box-right-list">
                                    <span class="price">
                                        <?php //Check Order Type
                                        if($order_detail['is_order_type'] == "pre_order") {
                                            echo "Pre Order"; 
                                        } else {
                                            echo "Simple Order";
                                        } ?>
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div class="box-left-list">
                                    <span>Customer ID:</span>
                                </div>
                                <div class="box-right-list">
                                    <span><?php echo $order_detail['user_id'] ?? ""; ?></span>
                                </div>
                            </li>
                             <li>
                                <div class="box-left-list">
                                    <span>Customer Name:</span>
                                </div>
                                <div class="box-right-list">
                                    <span><?php echo $order_detail['user']['name'] ?? ""; ?></span>
                                </div>
                            </li>
                            <li>
                                <div class="box-left-list">
                                    <span>Payment Method:</span>
                                </div>
                                <div class="box-right-list">
                                    <?php echo $order_detail['payment_method_type']; ?>
                                </div>
                            </li>
                            <li>
                                <div class="box-left-list">
                                    <span>Payment Status:</span>
                                </div>
                                <div class="box-right-list">
                                    <span><?php echo $order_detail['payment_status']; ?></span>
                                </div>
                            </li>
                            <li>
                                <div class="box-left-list">
                                    <span>Transaction ID:</span>
                                </div>
                                <div class="box-right-list">
                                    <span><?php echo $order_detail['trasaction_id']; ?></span>
                                </div>
                            </li>
                            <li>
                                <div class="box-left-list">
                                    <span>Grand Total:</span>
                                </div>
                                <div class="box-right-list">
                                    <span class="price">$ <?php echo $order_detail['order_amount']; ?></span>
                                </div>
                            </li>
                            <li>
                                <div class="box-left-list">
                                    <span>Placed Time:</span>
                                </div>
                                <div class="box-right-list">
                                    <span><?php echo Carbon::parse($order_detail['created_at']); ?></span>
                                </div>
                            </li>
                            <li class="status">
                                <div class="box-left-list">
                                    <span>Status</span>
                                </div>
                                <div class="box-right-list">
                                    <div class="select-dropdown">
                                        <select name="status" id="status">
                                            <option value="">Select Status</option>
                                            <option value="Pending" <?php if($order_detail['status'] == 'Pending'){ echo 'selected'; } ?>>Pending</option>
                                            <option value="Refunded" <?php if($order_detail['status'] == 'Refunded'){ echo 'selected'; } ?>>Refunded</option>
                                            <option value="Processing" <?php if($order_detail['status'] == 'Processing'){ echo 'selected'; } ?>>Processing</option>
                                            <option value="On Hold" <?php if($order_detail['status'] == 'On Hold'){ echo 'selected'; } ?>>On Hold</option>
                                            <option value="Cancelled" <?php if($order_detail['status'] == 'Cancelled'){ echo 'selected'; } ?>>Cancelled</option>
                                            <option value="Failed" <?php if($order_detail['status'] == 'Failed'){ echo 'selected'; } ?>>Failed</option>
                                            <option value="Completed" <?php if($order_detail['status'] == 'Completed'){ echo 'selected'; } ?>>Completed</option>
                                            <option value="Shipped" <?php if($order_detail['status'] == 'Shipped'){ echo 'selected'; } ?>>Shipped</option>
                                        </select>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </form>
                </div>
                <div class="order-items">
                    <h4>Order Items</h4>
                    <?php 
                    $item_count = 1;
                    foreach($order_detail['order_items'] as $key => $item) { ?>
                        <div class="item">
                            <p><strong>Sr No:</strong> <?php echo $item_count; ?></p>
                            <p><strong>Item Name:</strong> <?php echo $item['product_name']; ?></p>
                            <p><strong>Image:</strong> 
                              <img src="<?php echo url('public/uploads/products/'.$item['image']); ?>" height="50px" width="50px">
                            </p>
                            <p><strong>Quantity:</strong> <?php echo $item['quantity']; ?></p>
                            <p><strong>Price:</strong> <?php echo '$ '.$item['price']; ?></p>
                        </div>
                    <?php $item_count++; } ?>
                </div>
                <!-- Billing Address -->
                <div class="billing-address">
                    <h4>Billing Address</h4>
                    <p><strong>Name:</strong> <?php echo $order_detail['billing_address']['name']; ?></p>
                    <p><strong>Contact Number:</strong> <?php echo $order_detail['billing_address']['contact_number']; ?></p>
                    <p><strong>Email:</strong> <?php echo $order_detail['billing_address']['email']; ?></p>
                    <p><strong>Address: </strong><?php echo $order_detail['billing_address']['address']; ?></p>
                    <p><strong>Street Address: </strong><?php echo $order_detail['billing_address']['street_address']; ?></p>
                    <p><strong>City:</strong> <?php echo $order_detail['billing_address']['city']; ?></p>
                    <p><strong>State:</strong> <?php echo  $order_detail['billing_address']['state'] ; ?></p>
                    <p><strong>Pincode:</strong> <?php echo  $order_detail['billing_address']['pincode']; ?></p>
                    <p><strong>Country:</strong> <?php echo  $order_detail['billing_address']['country']; ?></p>
                </div>
                <!-- Shiping Address -->
                <?php if($order_detail['billing_address']['shipping_method'] == "Yes"){ ?>
                <div class="billing-address">
                    <h4>Shipping Address</h4>
                    <p><strong>Name:</strong> <?php echo $order_detail['billing_address']['shipping_name']; ?></p>
                    <p><strong>Contact Number:</strong> <?php echo $order_detail['billing_address']['shipping_contact_number']; ?></p>
                    <p><strong>Email:</strong> <?php echo $order_detail['billing_address']['shipping_email']; ?></p>
                    <p><strong>Address: </strong><?php echo $order_detail['billing_address']['shipping_address']; ?></p>
                    <p><strong>Street Address: </strong><?php echo $order_detail['billing_address']['shipping_street_address']; ?></p>
                    <p><strong>City:</strong> <?php echo $order_detail['billing_address']['shipping_city']; ?></p>
                    <p><strong>State:</strong> <?php echo  $order_detail['billing_address']['shipping_state'] ; ?></p>
                    <p><strong>Pincode:</strong> <?php echo  $order_detail['billing_address']['shipping_pincode']; ?></p>
                    <p><strong>Country:</strong> <?php echo  $order_detail['billing_address']['shipping_country']; ?></p>
                </div>
                <?php } else { ?>
                    <div class="billing-address">
                    <h4>Shipping Address</h4>
                    <p><strong>Name:</strong> <?php echo $order_detail['billing_address']['name']; ?></p>
                    <p><strong>Contact Number:</strong> <?php echo $order_detail['billing_address']['contact_number']; ?></p>
                    <p><strong>Email:</strong> <?php echo $order_detail['billing_address']['email']; ?></p>
                    <p><strong>Address: </strong><?php echo $order_detail['billing_address']['address']; ?></p>
                    <p><strong>Street Address: </strong><?php echo $order_detail['billing_address']['street_address']; ?></p>
                    <p><strong>City:</strong> <?php echo $order_detail['billing_address']['city']; ?></p>
                    <p><strong>State:</strong> <?php echo  $order_detail['billing_address']['state'] ; ?></p>
                    <p><strong>Pincode:</strong> <?php echo  $order_detail['billing_address']['pincode']; ?></p>
                    <p><strong>Country:</strong> <?php echo  $order_detail['billing_address']['country']; ?></p>
                </div>
                <?php } ?>
            </div>
        <?php  } else {
            echo '<p style="color:red;">No Order Items Not Found.</p>';
        }
    }
}
