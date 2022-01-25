<?php

use Illuminate\Support\Facades\Route;
//Server Cinfugure
Route::get("/sitemap", "App\Http\Controllers\HomeController@sitemap")->name("sitemap");

Route::get('/cache', function (){
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('clear-compiled');
    \Illuminate\Support\Facades\Artisan::call('optimize');
});

Route::get('/vendor', function (){
    \Illuminate\Support\Facades\Artisan::call('vendor:publish');
});
//Server Cinfugure


//Home
Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home");
Route::get('/contact', 'App\Http\Controllers\HomeController@contact')->name("contact");
Route::post('/contact-action', 'App\Http\Controllers\HomeController@contactAction')->name("contact_action");
Route::get('/about-us', 'App\Http\Controllers\HomeController@AboutUs')->name("about_Us");
//Route::get('/seo', 'App\Http\Controllers\HomeController@seo')->name("seo");
Route::get('/policy', 'App\Http\Controllers\HomeController@policy')->name("policy");
Route::get('/category', 'App\Http\Controllers\HomeController@category')->name("category");
Route::get('/single-category/{slug}', 'App\Http\Controllers\HomeController@singleCategory')->name("single_category");
Route::get('/tag/{slug}', 'App\Http\Controllers\HomeController@tag')->name("tag");
//Home

//MAIL
Route::get('/verify-email', 'App\Http\Controllers\Controller@build_mail')->name('build_mail');
Route::get('/incoming-download-link', 'App\Http\Controllers\ProfileController@incomingDownloadLink')->name('incoming_download_link');

//ADMIN
Route::middleware(['admin'])->prefix("armanmask")->group(function () {
    Route::get('/', 'App\Http\Controllers\AdminController@armanmask')->name("armanmask");
    //User Manager
    Route::post('/search-user', 'App\Http\Controllers\AdminController@search_user')->name("search_user")->middleware("ajax", "verify.domain");
    Route::post('/save-user', 'App\Http\Controllers\AdminController@save_user')->name("save_user")->middleware("ajax", "verify.domain");
    Route::post('/sms-user', 'App\Http\Controllers\AdminController@SmsUser')->name("Sms_User")->middleware("ajax", "verify.domain");
    Route::post('/email-user', 'App\Http\Controllers\AdminController@EmailUser')->name("Email_User")->middleware("ajax", "verify.domain");
    Route::get('/admin-users', 'App\Http\Controllers\AdminController@AdminUsers')->name("Admin_Users");
    Route::get('/seo-pages', 'App\Http\Controllers\AdminController@seoPages')->name("seo_pages");
    Route::post('/homepage-seo', 'App\Http\Controllers\AdminController@homePageSeo')->name("home_page_seo");
    Route::post('/extra-page-seo', 'App\Http\Controllers\AdminController@extraPageSeo')->name("extra_page_seo");
    Route::get('/admin-users/get-user', 'App\Http\Controllers\AdminController@GetUser')->name("get_user");
    Route::post('/admin-users/delete-user', 'App\Http\Controllers\AdminController@DeleteUserAction')->name("delete_user_action")->middleware("ajax", "verify.domain");
    Route::post('/admin-users/edit-user', 'App\Http\Controllers\AdminController@EditUserAction')->name("edit_user_action")->middleware("ajax", "verify.domain");
    //Credit
    Route::get('/credit', 'App\Http\Controllers\AdminController@Credit')->name("credit");
    Route::get('/credit-suggestion-action', 'App\Http\Controllers\AdminController@SuggestionAction')->name("suggestion_action");
    Route::post('/credit-show-action', 'App\Http\Controllers\AdminController@CreditShowAction')->name("credit_show_action")->middleware("ajax", "verify.domain");
    Route::post('/credit-charge-action', 'App\Http\Controllers\AdminController@CreditChargeAction')->name("credit_charge_action")->middleware("ajax", "verify.domain");
    //Contact_Us
    Route::get('/contact-us', 'App\Http\Controllers\AdminController@ContactUs')->name("Contact_Us");
    Route::get('/contact-us/get-user', 'App\Http\Controllers\AdminController@ContactUs_GetUser')->name("Contact_Us_GetUser");
    Route::post('/contact-us/sms-user', 'App\Http\Controllers\AdminController@ContactUs_SmsUser')->name("Contact_Us_Sms_User")->middleware("ajax", "verify.domain");
    Route::post('/contact-us/email-user', 'App\Http\Controllers\AdminController@ContactUs_EmailUser')->name("Contact_Us_Email_User")->middleware("ajax", "verify.domain");
    //Product
    Route::get('/product', 'App\Http\Controllers\AdminController@Product')->name("Product");
    Route::get('/product/get-store', 'App\Http\Controllers\AdminController@Product_GetStore')->name("Product_Get_store");
    Route::get('/product/product-suggestion-action', 'App\Http\Controllers\AdminController@product_SuggestionAction')->name("product_suggestion_action");
    Route::post('/product/product-show-action', 'App\Http\Controllers\AdminController@ProductShowAction')->name("product_show_action")->middleware("ajax", "verify.domain");
    Route::post('/product/add-product', 'App\Http\Controllers\AdminController@addProduct')->name("add_product");
    Route::post('/product/get-variety', 'App\Http\Controllers\AdminController@getVariety')->name("get_variety");
    Route::post('/product/add-tag', 'App\Http\Controllers\AdminController@addTag')->name("add_tag");
    Route::get('/product/add-category-page', 'App\Http\Controllers\AdminController@addCategoryPage')->name("add_category_page");
    Route::get('/product/add-tag-page', 'App\Http\Controllers\AdminController@addTagPage')->name("add_tag_page");
    Route::post('/product/add-category', 'App\Http\Controllers\AdminController@addCategory')->name("add_category");
    Route::post('/product/add-tag', 'App\Http\Controllers\AdminController@addTagg')->name("add_tag");
    Route::post('/product/add-category-variety', 'App\Http\Controllers\AdminController@addCategoryVariety')->name("add_category_variety");
    Route::get('/product/delete-category/{id}', 'App\Http\Controllers\AdminController@deleteCategory')->name("delete_category");
    Route::get('/product/delete-tag/{id}', 'App\Http\Controllers\AdminController@deleteTag')->name("delete_tag");
    Route::get('/product/delete-product/{id}', 'App\Http\Controllers\AdminController@deleteProduct')->name("delete_product");
    Route::get('/product/edit-category/{id}', 'App\Http\Controllers\AdminController@editCategory')->name("edit_category");
    Route::get('/product/edit-tag/{id}', 'App\Http\Controllers\AdminController@editTag')->name("edit_tag");
    Route::post('/product/edit-category-action', 'App\Http\Controllers\AdminController@editCategoryAction')->name("edit_category_action");
    Route::post('/product/edit-tag-action', 'App\Http\Controllers\AdminController@editTagAction')->name("edit_tag_action");
    Route::get('/product/edit-product/{id}', 'App\Http\Controllers\AdminController@editProduct')->name("edit_product");
    Route::get('/product/show-product', 'App\Http\Controllers\AdminController@showProduct')->name("show_product");
    Route::post('/product/admin-edit-product-action', 'App\Http\Controllers\AdminController@adminEditproductAction')->name("admin_edit_product_action");
    Route::post('/product/image-edit-product-action', 'App\Http\Controllers\AdminController@imageEditproductAction')->name("image_edit_product_action");
    Route::post('/product/slider-edit-product-action', 'App\Http\Controllers\AdminController@sliderEditproductAction')->name("slider_edit_product_action");
    Route::post('/product/delete-slider', 'App\Http\Controllers\AdminController@deleteSlider')->name("delete_slider");
    Route::post('/product/image-edit-category-action', 'App\Http\Controllers\AdminController@imageEditcategoryAction')->name("image_edit_category_action");
    Route::post('/product/image-edit-tag-action', 'App\Http\Controllers\AdminController@imageEdittagAction')->name("image_edit_tag_action");
    Route::post('/product/admin-file-product-action', 'App\Http\Controllers\AdminController@adminFileproductAction')->name("admin_file_product_action");
    Route::post('/product/festival', 'App\Http\Controllers\AdminController@Festival')->name("festival");
    Route::post('upload/tiny/image','App\Http\Controllers\UploadController@uploadImageDescription')->name('tiny.upload');
    //DYNAMIC
    Route::get('/dynamic/dynamic-home-page', 'App\Http\Controllers\AdminController@dynamicHomePage')->name("dynamic_home_page");
    Route::post('/dynamic/slider-product', 'App\Http\Controllers\AdminController@dynamicSliderProduct')->name("slider_product");
    Route::post('/dynamic/slider-product-edit', 'App\Http\Controllers\AdminController@dynamicSliderProductEdit')->name("slider_product_edit");
    Route::post('/dynamic/box-product', 'App\Http\Controllers\AdminController@dynamicBoxProduct')->name("box_product");
    Route::post('/dynamic/box-product-edit', 'App\Http\Controllers\AdminController@dynamicBoxProductEdit')->name("box_product_edit");
    Route::get('/dynamic/about-contact-us', 'App\Http\Controllers\AdminController@dynamicAboutContactUs')->name("dynamic_about_contact_us");
    Route::post('/dynamic/about-contact-us-action', 'App\Http\Controllers\AdminController@dynamicAboutUsAction')->name("about_contact_us_action");
    Route::post('/dynamic/about-contact-us', 'App\Http\Controllers\AdminController@dynamicContactUs')->name("about_contact_us");
    //Orders Management
    Route::get('/orders/orders-management', 'App\Http\Controllers\AdminController@OrderManagment')->name("orders_management");
    Route::get('/orders/datatable-get-orders', 'App\Http\Controllers\AdminController@dataTablesGetOrders')->name("datatable_get_orders");
    Route::post('/orders/show-order-details', 'App\Http\Controllers\AdminController@showOrderDetails')->name("show_order_details");
});


//AUTHENTICATION
Route::get('/register', 'App\Http\Controllers\LoginController@register')->name("register");
Route::post('/register-action', 'App\Http\Controllers\LoginController@registerAction')->name("register_action");
Route::post('/shipping-register-action', 'App\Http\Controllers\LoginController@shippingRegisterAction')->name("shipping_register_action");
Route::post('/verified-code-action', 'App\Http\Controllers\LoginController@verifiedCodeAction')->name("verified_code_action");
Route::post('/shipping-verified-code-action', 'App\Http\Controllers\LoginController@shippingVerifiedCodeAction')->name("shipping_verified_code_action");
Route::post('/shipping-signup', 'App\Http\Controllers\LoginController@shippingSignUp')->name("shipping_signup");
Route::get('/login', 'App\Http\Controllers\LoginController@login')->name("login");
Route::post('/login-action', 'App\Http\Controllers\LoginController@loginAction')->name("login_action");
Route::post('/one-time-code', 'App\Http\Controllers\LoginController@oneTimeCode')->name("one_time_code");
Route::get('/logout', 'App\Http\Controllers\LoginController@Logout')->name("logout")->middleware("auth");
Route::get('/change-password', 'App\Http\Controllers\LoginController@changePassword')->name("change_password");
Route::post('/change-password-action', 'App\Http\Controllers\LoginController@changePasswordAction')->name("change_password_action")->middleware("auth");


//PROFILE
Route::prefix("profile")->group(function () {
    Route::get('/', 'App\Http\Controllers\ProfileController@Index')->name("profile_index");
    Route::get('/edit', 'App\Http\Controllers\ProfileController@ProfileEdit')->name("profile_edit");
    Route::post('/edit-action', 'App\Http\Controllers\ProfileController@ProfileEditAction')->name("profile_edit_action");
    Route::get('/bookmark', 'App\Http\Controllers\ProfileController@Bookmark')->name("profile_bookmark");
    Route::post('/bookmark', 'App\Http\Controllers\ProfileController@Bookmark')->name("bookmark");
    Route::post('/like', 'App\Http\Controllers\ProfileController@like')->name("like");
    Route::post('/bookmark-delete', 'App\Http\Controllers\ProfileController@BookmarkDelete')->name("profile_bookmark_delete")->middleware("ajax", "verify.domain");
    Route::post('/like-delete', 'App\Http\Controllers\ProfileController@likeDelete')->name("profile_like_delete")->middleware("ajax", "verify.domain");
    Route::get('/email-verify-action', 'App\Http\Controllers\ProfileController@EmailVerifyAction')->name('email_verify_action');
    Route::get('/credit', 'App\Http\Controllers\ProfileController@ProfileCredit')->name("profile_credit");
    Route::post('/credit-action', 'App\Http\Controllers\ProfileController@CreditAction')->name("profile_credit_action");
    Route::get('/orders', 'App\Http\Controllers\ProfileController@orders')->name("orders");
    Route::get('/order-details/{order_id}', 'App\Http\Controllers\ProfileController@orderDetails')->name("order_details");
    Route::post('/quick-view', 'App\Http\Controllers\HomeController@quickView')->name("quick_view");
});

//PRODUCTS
Route::prefix("product")->group(function () {
    Route::get('/products', 'App\Http\Controllers\ProfileController@Products')->name("profile_products");
    Route::get('/single-product/{slug}', 'App\Http\Controllers\ProfileController@SingleProduct')->name("single_product");
    Route::get('/add-product', 'App\Http\Controllers\ProfileController@AddProduct')->name("profile_add_product");
    Route::post('/add-product-action', 'App\Http\Controllers\ProfileController@AddProductAction')->name("add_product_action");
    Route::get('/edit-product/{id}', 'App\Http\Controllers\ProfileController@EditProductSingle')->name("profile_edit_product");
    Route::post('/edit-product-action', 'App\Http\Controllers\ProfileController@EditProductSingleAction')->name("edit_product_action");
    Route::post('/delete-product-action', 'App\Http\Controllers\ProfileController@DeleteProductAction')->name("delete_product_action");
    //Ticket
    Route::get('/my-tickets', 'App\Http\Controllers\ProfileController@myTickets')->name("my_tickets");
    Route::post('/new-ticket', 'App\Http\Controllers\ProfileController@newTicket')->name("new_ticket");
    Route::post('/get-answer', 'App\Http\Controllers\ProfileController@getAnswer')->name("get_answer");
    Route::post('/delete-ticket', 'App\Http\Controllers\ProfileController@deleteTicket')->name("delete_ticket");
    //Comment
    Route::post('/new-comment', 'App\Http\Controllers\ProfileController@newComment')->name("new_comment");
    //Rate
    Route::post('/rate', 'App\Http\Controllers\HomeController@Rate')->name("rate");
});

//CART
Route::prefix("cart")->group(function () {
    Route::get('/cart/{id}', 'App\Http\Controllers\ProfileController@Cart')->name("cart");
    Route::post('/quick-add-cart', 'App\Http\Controllers\ProfileController@quickAddCart')->name("quick_add_cart");
    Route::post('/add-cart', 'App\Http\Controllers\CartController@addCart')->name('add_cart');
    Route::post('/remove-cart', 'App\Http\Controllers\CartController@removeCart')->name('remove_cart');
    Route::get('/cart-page', 'App\Http\Controllers\ProfileController@CartPage')->name("cart_page");
    Route::get('/shipping-page', 'App\Http\Controllers\ProfileController@shippingPage')->name("shipping_page");
    Route::post('/shipping-action', 'App\Http\Controllers\ProfileController@shippingAction')->name("shipping_action");
    Route::get('/show-session-cart', 'App\Http\Controllers\ProfileController@showSessionCart')->name("show_session_cart");
    Route::get('/forget-session-cart', 'App\Http\Controllers\ProfileController@forgetSessionCart')->name("forget_session_cart");
    Route::get('/show-shipping-cart', 'App\Http\Controllers\ProfileController@showShippingCart')->name("show_shipping_cart");
    Route::get('/forget-shipping-cart', 'App\Http\Controllers\ProfileController@forgetShippingCart')->name("forget_shipping_cart");
    Route::get('/cart-product-delete/{key}', 'App\Http\Controllers\ProfileController@CartProductDelete')->name("cart_product_delete");
    Route::post('/before-buying', 'App\Http\Controllers\ProfileController@BeforeBuying')->name("before_buying");
    Route::get('/shopping-peyment', 'App\Http\Controllers\ProfileController@shoppingPeyment')->name("shopping_peyment");
    Route::get('/shopping-complete/{ref}', 'App\Http\Controllers\ProfileController@shoppingComplete')->name("shopping_complete");
    Route::get('/shopping-peyment-page', 'App\Http\Controllers\ProfileController@shoppingPeymentpage')->name("shopping_peyment_page");
    Route::get('/cart-transfer', 'App\Http\Controllers\ProfileController@CartTransfer')->name("profile_cart_transfer");
    Route::post('/cart-transfer-action', 'App\Http\Controllers\ProfileController@CartTransferAction')->name("profile_cart_transfer_action");
    Route::post('/cart-calculator', 'App\Http\Controllers\ProfileController@cartCalculator')->name("cart_calculator");
});

//bank
Route::get("/payment", "App\Http\Controllers\PaymentController@payment")->middleware(["auth"])->name("payment");
Route::any("/verify", "App\Http\Controllers\PaymentController@verify")->middleware("auth")->name("verify");
Route::any("/verify-cart", "App\Http\Controllers\PaymentController@verifyCart")->middleware("auth")->name("verify_cart");


//BLOG
Route::get('/mag', 'App\Http\Controllers\BlogController@mag')->name("mag");
Route::get('/single-mag/{slug}', 'App\Http\Controllers\BlogController@singleMag')->name("single_mag");
Route::get('/single-blog-category/{slug}', 'App\Http\Controllers\BlogController@singleBlogCategory')->name("single_blog_category");
Route::get('/new-single-mag', 'App\Http\Controllers\BlogController@newSingleMag')->name("new_single_mag");
Route::get('/show-single-mag', 'App\Http\Controllers\BlogController@showSingleMag')->name("show_single_mag");
Route::get('/category-mag-page', 'App\Http\Controllers\BlogController@categoryMagPage')->name("category_mag_page");
Route::post('/new-blog-category-action', 'App\Http\Controllers\BlogController@newBlogCategoryAction')->name("new_blog_category_action");
Route::get('/edit-category-mag-page/{id}', 'App\Http\Controllers\BlogController@editCategoryMagPage')->name("edit_category_mag_page");
Route::post('/edit-category-mag-action', 'App\Http\Controllers\BlogController@editCategoryMagAction')->name("edit_category_mag_action");
Route::get('/tag-mag-page', 'App\Http\Controllers\BlogController@tagMagPage')->name("tag_mag_page");
Route::post('/new-blog-tag-action', 'App\Http\Controllers\BlogController@newBlogTagAction')->name("new_blog_tag_action");
Route::post('/new-single-mag-action', 'App\Http\Controllers\BlogController@newSingleMagAction')->name("new_single_mag_action");
Route::get('/edit-tag-mag-page/{id}', 'App\Http\Controllers\BlogController@editTagMagPage')->name("edit_tag_mag_page");
Route::post('/edit-blog-tag-action', 'App\Http\Controllers\BlogController@editBlogTagAction')->name("edit_blog_tag_action");
Route::post('/edit-single-mag-action', 'App\Http\Controllers\BlogController@editSingleMagAction')->name("edit_single_mag_action");
Route::post('/new-single-mag-comment', 'App\Http\Controllers\BlogController@newSingleMagComment')->name("new_single_mag_comment");
Route::get('/edit-mag-page/{post_id}', 'App\Http\Controllers\BlogController@editMagPage')->name("edit_mag_page");
Route::post('/edit-image-mag-action', 'App\Http\Controllers\BlogController@editImageMagAction')->name("edit_image_mag_action");
Route::get('/delete-mag-action/{post_id}', 'App\Http\Controllers\BlogController@deleteMagAction')->name("delete_mag_action");
Route::get('/delete-tag-action/{id}', 'App\Http\Controllers\BlogController@deleteTagAction')->name("delete_tag_action");
Route::get('/delete-category-action/{id}', 'App\Http\Controllers\BlogController@deleteCategoryAction')->name("delete_category_action");




//Route::post('/shop/edit-cart', 'App\Http\Controllers\CartController@editCart')->name('edit_cart');
//Route::post('/shop/show-cart', 'App\Http\Controllers\CartController@showCart')->name('show_cart');
//Route::get('/checkout', 'App\Http\Controllers\CartController@checkout')->name('checkout');
//Route::post('/checkout-order', 'App\Http\Controllers\CartController@checkoutOrder')->name('checkout_order');
