<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Auth::routes(['verify' => true]); 
Route::post('submit-custom-register', [App\Http\Controllers\CustomRegisterController::class, 'submit_custom_register']);
Route::post('submit-company', [App\Http\Controllers\CustomRegisterController::class, 'submit_company']);
Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\CustomRegisterController::class, 'verify'])->name('verification.verify'); 

//Common Route
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\FrontEndController::class, 'home']);
Route::get('redeem-center', [App\Http\Controllers\FrontEndController::class, 'redeem_center']);
Route::get('business-register', [App\Http\Controllers\FrontEndController::class, 'business_register']);
Route::get('membership', [App\Http\Controllers\FrontEndController::class, 'membership']);
Route::get('select-membership', [App\Http\Controllers\FrontEndController::class, 'select_membership']);
//Route::get('how-to-earn-more-points', [App\Http\Controllers\FrontEndController::class, 'how_to_earn_more_points']); 
Route::get('about-us', [App\Http\Controllers\FrontEndController::class, 'about_us']); 
Route::get('careers-opportunities', [App\Http\Controllers\FrontEndController::class, 'careers_opportunities']); 
Route::get('faqs', [App\Http\Controllers\FrontEndController::class, 'faqs']); 
Route::get('privacy-policy', [App\Http\Controllers\FrontEndController::class, 'privacy_policy']); 
Route::get('terms-and-conditions', [App\Http\Controllers\FrontEndController::class, 'terms_and_conditions']); 
Route::get('cookies', [App\Http\Controllers\FrontEndController::class, 'cookies']); 
Route::get('whistleblower-policy', [App\Http\Controllers\FrontEndController::class, 'whistleblower_policy']); 
Route::get('vulnerability-disclosure-program', [App\Http\Controllers\FrontEndController::class, 'vulnerability_disclosure_program']); 
Route::get('the-watchdog-report', [App\Http\Controllers\FrontEndController::class, 'the_watchdog_report']); 
Route::get('meet-our-team', [App\Http\Controllers\FrontEndController::class, 'view_team_members']); 
Route::get('foundation', [App\Http\Controllers\FrontEndController::class, 'foundation_page']);
Route::get('corporate-business', [App\Http\Controllers\FrontEndController::class, 'corporate_business']);
Route::get('gift-cards', [App\Http\Controllers\FrontEndController::class, 'gift_cards']);
Route::get('brands', [App\Http\Controllers\FrontEndController::class, 'all_brands']);
Route::get('help-center', [App\Http\Controllers\FrontEndController::class, 'help_center']);
Route::get('category/{any}', [App\Http\Controllers\CategoryController::class, 'single_category_detail']);
Route::get('contact-us', [App\Http\Controllers\ContactUsController::class, 'contact_us']);
Route::post('submit-contact-us', [App\Http\Controllers\ContactUsController::class, 'submit_contact_us']);
Route::get('shop', [App\Http\Controllers\ShopController::class, 'shop']);
Route::get('shop-search', [App\Http\Controllers\ShopController::class, 'search_products']);

Route::get('product/{any}', [App\Http\Controllers\ShopController::class, 'shopdetails']);
Route::get('aussie-rules-rewards-promotion', [App\Http\Controllers\ShopController::class, 'aussie_rules_rewards_promotion']);
Route::get('features', [App\Http\Controllers\ShopController::class, 'features']);
Route::get('cart', [App\Http\Controllers\ShopController::class, 'cart']);
Route::get('checkout', [App\Http\Controllers\ShopController::class, 'checkout']);
Route::get('search-top-header-products', [App\Http\Controllers\ShopController::class, 'search_top_header_products']);
Route::get('gift-card-cart', [App\Http\Controllers\ShopController::class, 'gift_cart_cart']);
Route::get('gift-card-checkout', [App\Http\Controllers\ShopController::class, 'gift_card_checkout']);
Route::post('pre-order-add-to-cart', [App\Http\Controllers\CartController::class, 'pre_order_add_to_cart']);
Route::post('add-to-cart', [App\Http\Controllers\CartController::class, 'add_to_cart']);
Route::post('remove-cart-item', [App\Http\Controllers\CartController::class, 'remove_cart_item']);
Route::post('remove-cart-points', [App\Http\Controllers\CartController::class, 'remove_cart_points']);
Route::post('submit-checkout', [App\Http\Controllers\CartController::class, 'submit_checkout']);
Route::post('gift-card-add-to-cart', [App\Http\Controllers\CartController::class, 'gift_card_add_to_cart']);
Route::post('remove-gift-card-cart-item', [App\Http\Controllers\CartController::class, 'remove_gift_card_cart_item']);
Route::post('submit-gift-card-checkout', [App\Http\Controllers\CartController::class, 'submit_gift_card_checkout']);
Route::post('submit-gift-card-apply-coupon-code', [App\Http\Controllers\CartController::class, 'submit_apply_gift_card_coupon_code']);
Route::post('submit-cart-apply-coupon-code', [App\Http\Controllers\CartController::class, 'submit_apply_cart_coupon_code']);
Route::post('submit-rating', [App\Http\Controllers\ProductReviewsController::class, 'submit_rating']);
Route::get('get-country-states', [App\Http\Controllers\CountryListController::class, 'get_country_states']);


//Customer routes
Route::group(['middleware' => ['auth', 'customer']], function () {
    Route::get('customer/my-account', [App\Http\Controllers\Customer\DashboardController::class, 'my_account']);
    Route::get('customer/my-orders', [App\Http\Controllers\Customer\DashboardController::class, 'my_orders']);
    Route::get('customer/addresses', [App\Http\Controllers\Customer\DashboardController::class, 'addresses']);
    Route::get('customer/account-details', [App\Http\Controllers\Customer\DashboardController::class, 'account_details']);
    Route::post('customer/submit-account-details',[App\Http\Controllers\Customer\DashboardController::class,'submit_account_detail'])->name('customer.submit_account_detail');
    Route::get('customer/order-placed/{id}', [App\Http\Controllers\Customer\DashboardController::class, 'order_placed']);
    Route::get('customer/my-downloads', [App\Http\Controllers\Customer\DashboardController::class, 'my_downloads']);
    Route::get('customer/store-credit', [App\Http\Controllers\Customer\DashboardController::class, 'my_store_credit']);
    Route::get('customer/edit-billing-address', [App\Http\Controllers\Customer\DashboardController::class, 'edit_billing_address']);
    Route::post('customer/submit-billing-address',[App\Http\Controllers\Customer\DashboardController::class, 'submit_billing_address'])->name('customer.submit.billing.address');
    Route::get('customer/edit-shipping-address', [App\Http\Controllers\Customer\DashboardController::class, 'edit_shipping_address']);
    Route::post('customer/submit-shipping-address',[App\Http\Controllers\Customer\DashboardController::class, 'submit_shipping_address'])->name('customer.submit.shipping.address');
    Route::get('customer/my-order-detail/{id}', [App\Http\Controllers\Customer\DashboardController::class, 'my_order_detail']);
    Route::get('customer/refer-to-friends', [App\Http\Controllers\Customer\DashboardController::class, 'refer_to_friends']);
    Route::post('customer/submit-invite-friend-to-refer', [App\Http\Controllers\Customer\DashboardController::class, 'submit_invite_friend_to_refer']);
    Route::get('customer/my-gift-cards', [App\Http\Controllers\Customer\DashboardController::class, 'my_gift_card']);
    Route::get('customer/redeem-gift-cards', [App\Http\Controllers\Customer\DashboardController::class, 'redeem_gift_cards']);
    Route::post('customer/submit-verify-coupon-code', [App\Http\Controllers\Customer\DashboardController::class, 'submit_verify_coupon_code']);
    Route::get('customer/my-balance', [App\Http\Controllers\Customer\DashboardController::class, 'my_balance']);
    Route::post('customer/add-to-wishlist', [App\Http\Controllers\Customer\WishlistController::class, 'add_to_wishlist']);
    Route::get('customer/my-wishlist', [App\Http\Controllers\Customer\WishlistController::class, 'view_my_wishlist']);
    Route::post('customer/remove-my-wishlist', [App\Http\Controllers\Customer\WishlistController::class, 'remove_wishlist_product']);
});

//Company routes 
Route::group(['middleware' => ['auth', 'company']], function () {
    Route::get('company/my-account', [App\Http\Controllers\Company\DashboardController::class, 'my_account']);
    Route::post('company/submit-purchaged-gift-card', [App\Http\Controllers\Company\DashboardController::class, 'submit_purchaged_gift_card']);
    Route::post('company/submit-management-gift-card', [App\Http\Controllers\Company\DashboardController::class, 'submit_management_gift_card']);
    Route::get('company/purchaged-gift-card-detail/{id}', [App\Http\Controllers\Company\DashboardController::class, 'my_purchaged_gift_card_detail']); 
    Route::get('company/my-corporate-gift-cards', [App\Http\Controllers\Company\DashboardController::class, 'my_corporate_gift_card']); 
    Route::get('company/export-corporate-gift-cards/{id}', [App\Http\Controllers\Company\DashboardController::class, 'export_gift_cards']); 
    Route::get('company/corporate-gift-cards', [App\Http\Controllers\Company\DashboardController::class, 'corporate_gift_cards']);
    Route::get('company/management-gift-cards', [App\Http\Controllers\Company\DashboardController::class, 'management_gift_cards']);
    Route::post('company/sent-link-coupon-code', [App\Http\Controllers\Company\DashboardController::class, 'sent_link_coupon_code']);
    Route::post('company/submit-issued-coupon-code', [App\Http\Controllers\Company\DashboardController::class, 'submit_issued_coupon_code']);
});
//Admin routes
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    //Order Section
    Route::get('admin/all-orders', [App\Http\Controllers\Admin\OrdersController::class, 'all_orders']);
    Route::get('admin/all-pre-orders', [App\Http\Controllers\Admin\OrdersController::class, 'all_pre_orders']);
    Route::get('admin/order-detail', [App\Http\Controllers\Admin\OrdersController::class, 'getOrderItems']);
    // Coupons Section
    Route::get('admin/add-coupon',[App\Http\Controllers\Admin\CouponCodesController::class, 'add_coupon']); 
    Route::post('admin/submit-coupon', [App\Http\Controllers\Admin\CouponCodesController::class, 'submit_coupon'])->name('admin.submit.coupon'); 
    Route::get('admin/all-coupons', [App\Http\Controllers\Admin\CouponCodesController::class, 'all_coupons']);
    Route::get('admin/edit-coupon/{id}', [App\Http\Controllers\Admin\CouponCodesController::class, 'edit_coupon']);
    Route::post('admin/update-coupon/{id}', [App\Http\Controllers\Admin\CouponCodesController::class, 'update_coupon'])->name('admin.update.coupon');
    Route::get('admin/delete-coupon/{id}', [App\Http\Controllers\Admin\CouponCodesController::class, 'delete_coupon']);    
    //products
    Route::get('admin/all-products', [App\Http\Controllers\Admin\ProductController::class, 'all_products']);
    Route::get('admin/add-new-product', [App\Http\Controllers\Admin\ProductController::class, 'add_new_product']);
    Route::post('admin/submit-product', [App\Http\Controllers\Admin\ProductController::class, 'submit_product'])->name('admin.submit.create.product');
    Route::get('admin/edit-product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit_product']);
    Route::post('admin/update-product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update_product'])->name('admin.submit.update.product');
    Route::get('admin/delete-attach-product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'delete_attach_category']);
    Route::get('admin/delete-product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'delete_product']);
    //Category
    Route::get('admin/all-categories', [App\Http\Controllers\Admin\ProductCategoryController::class, 'all_product_categories']);
    Route::get('admin/add-new-category', [App\Http\Controllers\Admin\ProductCategoryController::class, 'add_new_product_category']);
    Route::post('admin/submit-category', [App\Http\Controllers\Admin\ProductCategoryController::class, 'submit_product_category'])->name('admin.submit.create.product.category');
    Route::get('admin/edit-category/{id}', [App\Http\Controllers\Admin\ProductCategoryController::class, 'edit_product_category']);
    Route::post('admin/update-category/{id}', [App\Http\Controllers\Admin\ProductCategoryController::class, 'update_product_category'])->name('admin.submit.update.product.category');
    Route::get('admin/delete-category/{id}', [App\Http\Controllers\Admin\ProductCategoryController::class, 'delete_product_category']);
    //Testimonial
    Route::get('admin/all-testimonials-list', [App\Http\Controllers\Admin\TestimonialController::class, 'all_testimonials']);
    Route::get('admin/add-testimonials', [App\Http\Controllers\Admin\TestimonialController::class, 'add_testimonial']);
    Route::post('admin/submit-testimonial', [App\Http\Controllers\Admin\TestimonialController::class, 'submit_testimonial'])->name('admin.create.testimonial');
    Route::get('admin/edit-testimonial/{id}', [App\Http\Controllers\Admin\TestimonialController::class, 'edit_testimonial']);
    Route::get('admin/delete-testimonial/{id}', [App\Http\Controllers\Admin\TestimonialController::class, 'delete_testimonial']);
    Route::post('admin/update-testimonial/{id}', [App\Http\Controllers\Admin\TestimonialController::class, 'update_testimonial'])->name('admin.update.testimonial');
    //User
    Route::get('admin/add-new-customer', [App\Http\Controllers\Admin\CustomerUserController::class, 'add_new_customer']);
    Route::post('admin/submit-customer', [App\Http\Controllers\Admin\CustomerUserController::class, 'submit_customer'])->name('admin.submit.customer');
    Route::get('admin/all-customers-list', [App\Http\Controllers\Admin\CustomerUserController::class, 'customer_users']);
    Route::get('admin/edit-customer/{id}', [App\Http\Controllers\Admin\CustomerUserController::class, 'edit_customer']);
    Route::post('admin/update-customer/{id}', [App\Http\Controllers\Admin\CustomerUserController::class, 'update_customer'])->name('admin.update.customer');
    Route::get('admin/delete-customer/{id}', [App\Http\Controllers\Admin\CustomerUserController::class, 'delete_customer']);

    //Company
    Route::get('admin/all-company-list', [App\Http\Controllers\Admin\CompanyController::class, 'all_company']);
    Route::get('admin/all-purchased-gift-cards', [App\Http\Controllers\Admin\CompanyController::class, 'all_purchased_gift_cards']);
    Route::get('admin/purchased-gift-card-detail', [App\Http\Controllers\Admin\CompanyController::class, 'purchased_gift_card_detail']);

    //Faq
    Route::get('admin/all-faqs', [App\Http\Controllers\Admin\faqController::class, 'all_faqs_list']);
    Route::get('admin/faq', [App\Http\Controllers\Admin\faqController::class, 'view_faq']);
    Route::post('admin/submit-faq', [App\Http\Controllers\Admin\faqController::class, 'submit_faq'])->name('admin.submit.faq');
    Route::get('admin/edit-faq/{id}', [App\Http\Controllers\Admin\faqController::class, 'edit_faq']);
    Route::post('admin/update-faq/{id}', [App\Http\Controllers\Admin\faqController::class, 'update_faq'])->name('admin.update.faq');
    Route::get('admin/delete-faq/{id}', [App\Http\Controllers\Admin\faqController::class, 'delete_faq']);
    //team
    Route::get('admin/all-team-members', [App\Http\Controllers\Admin\TeamController::class, 'all_members']);
    Route::get('admin/add-new-team-member', [App\Http\Controllers\Admin\TeamController::class, 'add_team_member']);
    Route::post('admin/submit-team-member', [App\Http\Controllers\Admin\TeamController::class, 'submit_team_member'])->name('admin.submit.member');
    Route::get('admin/edit-team-member/{id}', [App\Http\Controllers\Admin\TeamController::class, 'edit_member']);
    Route::get('admin/delete-team-member/{id}', [App\Http\Controllers\Admin\TeamController::class, 'delete_team_member']);
    Route::post('admin/update-team-member/{id}', [App\Http\Controllers\Admin\TeamController::class, 'update_team_member'])->name('admin.update.member');

    //shipping
    Route::get('admin/add-new-shipping', [App\Http\Controllers\Admin\ShippingController::class, 'add_new_shipping']);
    Route::post('admin/submit-shipping', [App\Http\Controllers\Admin\ShippingController::class, 'submit_shipping'])->name('admin.submit.shipping');
    Route::get('admin/all-shipping', [App\Http\Controllers\Admin\ShippingController::class, 'all_listing']);
    Route::get('admin/edit-shipping/{id}', [App\Http\Controllers\Admin\ShippingController::class, 'edit_shipping']);
    Route::post('admin/update-shipping/{id}', [App\Http\Controllers\Admin\ShippingController::class, 'update_shipping'])->name('admin.update.shipping');
    Route::get('admin/delete-shipping/{id}', [App\Http\Controllers\Admin\ShippingController::class, 'delete_shipping']);
    Route::get('admin/add-other-setting', [App\Http\Controllers\Admin\ShippingController::class, 'add_other_setting']);
    Route::post('admin/submit-other-setting', [App\Http\Controllers\Admin\ShippingController::class, 'submit_other_setting'])->name('admin.submit.other.setting');

    //Membership Section
    /*Route::get('admin/all-membership', [App\Http\Controllers\Admin\MembershipController::class, 'all_membership']);
    Route::get('admin/add-new-membership',[App\Http\Controllers\Admin\MembershipController::class, 'add_membership']); 
    Route::post('admin/submit-membership', [App\Http\Controllers\Admin\MembershipController::class, 'submit_membership'])->name('admin.submit.membership'); 
    Route::get('admin/edit-membership/{id}', [App\Http\Controllers\Admin\MembershipController::class, 'edit_membership']);
    Route::post('admin/admin.update.membership/{id}', [App\Http\Controllers\Admin\MembershipController::class, 'update_membership'])->name('admin.update.membership');
    Route::get('admin/delete-membership/{id}', [App\Http\Controllers\Admin\MembershipController::class, 'delete_membership']);*/
    //Gift Card Section
    Route::get('admin/all-gift-cards', [App\Http\Controllers\Admin\GiftCardsController::class, 'all_gift_cards']);
    Route::get('admin/add-new-gift-cards',[App\Http\Controllers\Admin\GiftCardsController::class, 'add_gift_cards']); 
    Route::post('admin/submit-gift-cards', [App\Http\Controllers\Admin\GiftCardsController::class, 'submit_gift_cards'])->name('admin.submit.gift-cards'); 
    Route::get('admin/edit-gift-cards/{id}', [App\Http\Controllers\Admin\GiftCardsController::class, 'edit_gift_cards']);
    Route::post('admin/admin.update.gift-cards/{id}', [App\Http\Controllers\Admin\GiftCardsController::class, 'update_gift_cards'])->name('admin.update.gift-cards');
    Route::get('admin/delete-gift-cards/{id}', [App\Http\Controllers\Admin\GiftCardsController::class, 'delete_gift_cards']);

    //Brand And Logos Section
    Route::get('admin/all-brand-and-logos', [App\Http\Controllers\Admin\BrandsLogosController::class, 'all_brand_and_logos']);
    Route::get('admin/add-new-brand-and-logos',[App\Http\Controllers\Admin\BrandsLogosController::class, 'add_brand_and_logos']); 
    Route::post('admin/submit-brand-and-logos', [App\Http\Controllers\Admin\BrandsLogosController::class, 'submit_brand_and_logos'])->name('admin.submit.brand.and.logos'); 
    Route::get('admin/edit-brand-and-logos/{id}', [App\Http\Controllers\Admin\BrandsLogosController::class, 'edit_brand_and_logos']);
    Route::post('admin/admin.update.brand-and-logos/{id}', [App\Http\Controllers\Admin\BrandsLogosController::class, 'update_brand_and_logos'])->name('admin.update.brand.and.logos');
    Route::get('admin/delete-brand-and-logos/{id}', [App\Http\Controllers\Admin\BrandsLogosController::class, 'delete_brand_and_logos']);

    //page setting
    Route::get('admin/manage-page-setting', [App\Http\Controllers\Admin\PagesettingController::class, 'index']);
    Route::post('admin/update-page-setting', [App\Http\Controllers\Admin\PagesettingController::class, 'update'])->name('admin.update.page.setting');
});
