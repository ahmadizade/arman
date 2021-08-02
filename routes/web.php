<?php

use Illuminate\Support\Facades\Route;
Route::get("/sitemap", "App\Http\Controllers\HomeController@sitemap")->name("sitemap");

// home
Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home");
Route::get('/contact', 'App\Http\Controllers\HomeController@contact')->name("contact");
Route::post('/contact-action', 'App\Http\Controllers\HomeController@contactAction')->name("contact_action");
Route::get('/about-us', 'App\Http\Controllers\HomeController@AboutUs')->name("about_Us");
Route::get('/seo', 'App\Http\Controllers\HomeController@seo')->name("seo");
Route::get('/policy', 'App\Http\Controllers\HomeController@policy')->name("policy");
Route::get('/category/{slug}', 'App\Http\Controllers\HomeController@Category')->name("category");
Route::get('/tag/{slug}', 'App\Http\Controllers\HomeController@tag')->name("tag");

Route::get('/cache', function (){
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('clear-compiled');
    \Illuminate\Support\Facades\Artisan::call('optimize');
});

Route::get('/vendor', function (){
    \Illuminate\Support\Facades\Artisan::call('vendor:publish');
});


//MAIL
Route::get('/verify-email', 'App\Http\Controllers\Controller@build_mail')->name('build_mail');
Route::get('/incoming-download-link', 'App\Http\Controllers\ProfileController@incomingDownloadLink')->name('incoming_download_link');

// admin
Route::middleware(['admin'])->prefix("cioce")->group(function () {
    Route::get('/', 'App\Http\Controllers\AdminController@cioce')->name("cioce");
    //User Manager
    Route::post('/search-user', 'App\Http\Controllers\AdminController@search_user')->name("search_user")->middleware("ajax", "verify.domain");
    Route::post('/save-user', 'App\Http\Controllers\AdminController@save_user')->name("save_user")->middleware("ajax", "verify.domain");
    Route::post('/sms-user', 'App\Http\Controllers\AdminController@SmsUser')->name("Sms_User")->middleware("ajax", "verify.domain");
    Route::post('/email-user', 'App\Http\Controllers\AdminController@EmailUser')->name("Email_User")->middleware("ajax", "verify.domain");
    Route::get('/admin-users', 'App\Http\Controllers\AdminController@AdminUsers')->name("Admin_Users");
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
    //Store
    Route::get('/store', 'App\Http\Controllers\AdminController@Store')->name("Store");
    Route::get('/store/get-store', 'App\Http\Controllers\AdminController@Store_GetUser')->name("Store_GetUser");
    Route::post('/store/view-store', 'App\Http\Controllers\AdminController@Store_ViewStore')->name("Store_view_store")->middleware("ajax", "verify.domain");
    Route::post('/store/save-store-data', 'App\Http\Controllers\AdminController@SaveStoreData')->name("Save_store_Data_Action")->middleware("ajax", "verify.domain");
    Route::post('/store/delete-store-action', 'App\Http\Controllers\AdminController@DeleteStoreAction')->name("delete_store_action")->middleware("ajax", "verify.domain");
    Route::get('/store/get-report', 'App\Http\Controllers\AdminController@Store_GetReport')->name("Store_GetReport")->middleware("ajax", "verify.domain");
    Route::post('/store/view-report', 'App\Http\Controllers\AdminController@Store_ViewReport')->name("Store_view_report")->middleware("ajax", "verify.domain");
    Route::post('/store/save-report-data', 'App\Http\Controllers\AdminController@SaveReportData')->name("Save_report_Data_Action")->middleware("ajax", "verify.domain");
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
    Route::post('/product/image-edit-category-action', 'App\Http\Controllers\AdminController@imageEditcategoryAction')->name("image_edit_category_action");
    Route::post('/product/image-edit-tag-action', 'App\Http\Controllers\AdminController@imageEdittagAction')->name("image_edit_tag_action");
    Route::post('/product/admin-file-product-action', 'App\Http\Controllers\AdminController@adminFileproductAction')->name("admin_file_product_action");
    Route::post('upload/tiny/image','App\Http\Controllers\UploadController@uploadImageDescription')->name('tiny.upload');
    //Web Service
    Route::get('/api/new-webservice', 'App\Http\Controllers\AdminController@newWebservice')->name("new_webservice");
    Route::post('/api/new-webservice-action', 'App\Http\Controllers\AdminController@newWebserviceAction')->name("new_webservice_action");
    Route::get('/api/delete-api/{id}', 'App\Http\Controllers\AdminController@deleteApi')->name("delete_api");
    Route::get('/api/edit-api/{id}', 'App\Http\Controllers\AdminController@editApi')->name("edit_api");
    Route::post('/api/admin-edit-api-action', 'App\Http\Controllers\AdminController@adminEditapiAction')->name("admin_edit_api_action");
    Route::post('/api/image-edit-api-action', 'App\Http\Controllers\AdminController@imageEditapiAction')->name("image_edit_api_action");
    Route::post('/api/admin-file-api-action', 'App\Http\Controllers\AdminController@adminFileapiAction')->name("admin_file_api_action");
    Route::get('/api/show-webservice', 'App\Http\Controllers\AdminController@showWebservice')->name("show_webservice");

});
// admin


//QR.Code Generator
Route::get('/code-generator', 'App\Http\Controllers\CodeController@Code_Generator')->name("code_generator")->middleware("auth");


// auth
Route::get('/register', 'App\Http\Controllers\LoginController@register')->name("register");
Route::post('/register-action', 'App\Http\Controllers\LoginController@registerAction')->name("register_action");
Route::post('/verified-code-action', 'App\Http\Controllers\LoginController@verifiedCodeAction')->name("verified_code_action");
Route::get('/login', 'App\Http\Controllers\LoginController@login')->name("login");
Route::post('/login-action', 'App\Http\Controllers\LoginController@loginAction')->name("login_action");
Route::post('/one-time-code', 'App\Http\Controllers\LoginController@oneTimeCode')->name("one_time_code");
Route::get('/logout', 'App\Http\Controllers\LoginController@Logout')->name("logout")->middleware("auth");
Route::get('/change-password', 'App\Http\Controllers\LoginController@changePassword')->name("change_password");
Route::post('/change-password-action', 'App\Http\Controllers\LoginController@changePasswordAction')->name("change_password_action")->middleware("auth");


// profile
Route::prefix("profile")->group(function () {
    Route::get('/', 'App\Http\Controllers\ProfileController@Index')->name("profile_index");
    Route::get('/products', 'App\Http\Controllers\ProfileController@Products')->name("profile_products");
    Route::get('/single-product/{slug}', 'App\Http\Controllers\ProfileController@SingleProduct')->name("single_product");
    Route::get('/single-api/{slug}', 'App\Http\Controllers\ProfileController@SingleApi')->name("single_api");
    Route::get('/subscribe/{id}', 'App\Http\Controllers\ProfileController@subscribe')->name("subscribe");
    Route::get('/select-package', 'App\Http\Controllers\ProfileController@selectPackage')->name("select_package");
    Route::get('/choice/{id}/{type}', 'App\Http\Controllers\ProfileController@choice')->name("choice");
    Route::post('/add-domain', 'App\Http\Controllers\ProfileController@addDomain')->name("add_domain");
    Route::get('/card/{id}', 'App\Http\Controllers\ProfileController@Card')->name("card");
    Route::get('/cart-page', 'App\Http\Controllers\ProfileController@CartPage')->name("cart_page");
    Route::get('/show-session-cart', 'App\Http\Controllers\ProfileController@showSessionCart')->name("show_session_cart");
    Route::get('/show-shipping-cart', 'App\Http\Controllers\ProfileController@showShippingCart')->name("show_shipping_cart");
    Route::get('/forget-session-cart', 'App\Http\Controllers\ProfileController@forgetSessionCart')->name("forget_session_cart");
    Route::get('/forget-shipping-cart', 'App\Http\Controllers\ProfileController@forgetShippingCart')->name("forget_shipping_cart");
    Route::get('/cart-product-delete/{key}', 'App\Http\Controllers\ProfileController@CartProductDelete')->name("cart_product_delete");
    Route::get('/before-buying', 'App\Http\Controllers\ProfileController@BeforeBuying')->name("before_buying");
    Route::get('/shopping-peyment', 'App\Http\Controllers\ProfileController@shoppingPeyment')->name("shopping_peyment");
    Route::get('/shopping-complete/{ref}', 'App\Http\Controllers\ProfileController@shoppingComplete')->name("shopping_complete");
    Route::get('/shopping-peyment-page', 'App\Http\Controllers\ProfileController@shoppingPeymentpage')->name("shopping_peyment_page");
    Route::get('/add-product', 'App\Http\Controllers\ProfileController@AddProduct')->name("profile_add_product");
    Route::post('/add-product-action', 'App\Http\Controllers\ProfileController@AddProductAction')->name("add_product_action");
    Route::get('/edit-product/{id}', 'App\Http\Controllers\ProfileController@EditProductSingle')->name("profile_edit_product");
    Route::post('/edit-product-action', 'App\Http\Controllers\ProfileController@EditProductSingleAction')->name("edit_product_action");
    Route::post('/delete-product-action', 'App\Http\Controllers\ProfileController@DeleteProductAction')->name("delete_product_action");
    Route::get('/edit', 'App\Http\Controllers\ProfileController@ProfileEdit')->name("profile_edit");
    Route::post('/edit-action', 'App\Http\Controllers\ProfileController@ProfileEditAction')->name("profile_edit_action");
    Route::get('/gold', 'App\Http\Controllers\ProfileController@ProfileGold')->name("profile_gold");
    Route::post('/gold-online-action', 'App\Http\Controllers\ProfileController@ProfileGoldOnlineAction')->name("profile_gold_online_action");
    Route::get('/cart-transfer', 'App\Http\Controllers\ProfileController@CartTransfer')->name("profile_cart_transfer");
    Route::post('/cart-transfer-action', 'App\Http\Controllers\ProfileController@CartTransferAction')->name("profile_cart_transfer_action");
    Route::get('/store', 'App\Http\Controllers\ProfileController@Store')->name("profile_store");
    Route::get('/store-bio', 'App\Http\Controllers\ProfileController@StoreBio')->name("profile_bio");
    Route::post('/store-bio-action', 'App\Http\Controllers\ProfileController@StoreBioAction')->name("profile_bio_action");
    Route::post('/store-action', 'App\Http\Controllers\ProfileController@StoreAction')->name("store_action");
    Route::post('/store-edit-action', 'App\Http\Controllers\ProfileController@StoreEditAction')->name("store_edit_action");
    Route::post('/store-desc-action', 'App\Http\Controllers\ProfileController@StoreDescAction')->name("store_desc_action");
    Route::post('/store-category-action', 'App\Http\Controllers\ProfileController@StoreCategoryAction')->name("store_category_action");
    Route::get('/bookmark', 'App\Http\Controllers\ProfileController@Bookmark')->name("profile_bookmark");
    Route::get('/my-webservice', 'App\Http\Controllers\ProfileController@myWebService')->name("my_webservice");
    Route::post('/delete-my-webservice', 'App\Http\Controllers\ProfileController@deleteMyWebService')->name("delete_my_webservice");
    Route::post('/bookmark-delete', 'App\Http\Controllers\ProfileController@BookmarkDelete')->name("profile_bookmark_delete")->middleware("ajax", "verify.domain");
    Route::post('/like-delete', 'App\Http\Controllers\ProfileController@likeDelete')->name("profile_like_delete")->middleware("ajax", "verify.domain");
    Route::get('/email-verify-action', 'App\Http\Controllers\ProfileController@EmailVerifyAction')->name('email_verify_action');
    Route::get('/qrcode', 'App\Http\Controllers\ProfileController@Qrcode')->name("profile_qrcode");
    Route::post('/qrcode-action', 'App\Http\Controllers\ProfileController@QrcodeAction')->name("profile_qrcode_action");
    Route::post('/qrcode-action-mobile', 'App\Http\Controllers\ProfileController@QrcodeActionMobile')->name("profile_qrcode_action_mobile");
    Route::get('/credit', 'App\Http\Controllers\ProfileController@ProfileCredit')->name("profile_credit");
    Route::post('/credit-action', 'App\Http\Controllers\ProfileController@CreditAction')->name("profile_credit_action");
    Route::get('/orders', 'App\Http\Controllers\ProfileController@orders')->name("orders");
    Route::get('/order-details/{order_id}', 'App\Http\Controllers\ProfileController@orderDetails')->name("order_details");
    Route::get('/my-tickets', 'App\Http\Controllers\ProfileController@myTickets')->name("my_tickets");
    Route::post('/new-ticket', 'App\Http\Controllers\ProfileController@newTicket')->name("new_ticket");
    Route::post('/get-answer', 'App\Http\Controllers\ProfileController@getAnswer')->name("get_answer");
    Route::post('/delete-ticket', 'App\Http\Controllers\ProfileController@deleteTicket')->name("delete_ticket");
    Route::post('/link-builder', 'App\Http\Controllers\ProfileController@linkBuilder')->name("link_builder");
    Route::get('/download-link-page', 'App\Http\Controllers\ProfileController@downloadLinkPage')->name("download_link_page");
});


// shop
Route::prefix("shop")->group(function () {
    Route::post('/comment-action', 'App\Http\Controllers\ShopController@CommentAction')->name("comment_action");
    Route::post('/shop-like', 'App\Http\Controllers\ShopController@Like')->name("like")->middleware("ajax", "verify.domain");
    Route::post('/shop-bookmark', 'App\Http\Controllers\ShopController@Bookmark')->name("bookmark")->middleware("ajax", "verify.domain");
    Route::post('/shop-report', 'App\Http\Controllers\ShopController@Report')->name("report")->middleware("ajax", "verify.domain");
    Route::get('/search', 'App\Http\Controllers\ShopController@Search')->name("search");
    Route::get('/{shop}/{branch?}', 'App\Http\Controllers\ShopController@singleShop')->name("single_shop");
    Route::get('/product/{id}', 'App\Http\Controllers\ShopController@ProductSingle')->name("shop_product_single");
});


//Download File
Route::get('/download/{filename}', 'App\Http\Controllers\HomeController@download')->name("download");
Route::post('/purchase-download', 'App\Http\Controllers\ProfileController@purchaseDownload')->name("purchase_download");


//bank
Route::get("/payment", "App\Http\Controllers\PaymentController@payment")->middleware(["auth"])->name("payment");
Route::any("/verify", "App\Http\Controllers\PaymentController@verify")->middleware("auth")->name("verify");
Route::any("/verify-cart", "App\Http\Controllers\PaymentController@verifyCart")->middleware("auth")->name("verify_cart");


//BLOG
Route::get('/mag', 'App\Http\Controllers\BlogController@mag')->name("mag");
Route::get('/single-mag/{slug}', 'App\Http\Controllers\BlogController@singleMag')->name("single_mag");
Route::get('/new-single-mag', 'App\Http\Controllers\BlogController@newSingleMag')->name("new_single_mag");
Route::get('/show-single-mag', 'App\Http\Controllers\BlogController@showSingleMag')->name("show_single_mag");
Route::post('/new-single-mag-action', 'App\Http\Controllers\BlogController@newSingleMagAction')->name("new_single_mag_action");
Route::post('/edit-single-mag-action', 'App\Http\Controllers\BlogController@editSingleMagAction')->name("edit_single_mag_action");
Route::post('/new-single-mag-comment', 'App\Http\Controllers\BlogController@newSingleMagComment')->name("new_single_mag_comment");
Route::get('/edit-mag-page/{post_id}', 'App\Http\Controllers\BlogController@editMagPage')->name("edit_mag_page");
Route::post('/edit-image-mag-action', 'App\Http\Controllers\BlogController@editImageMagAction')->name("edit_image_mag_action");
Route::get('/delete-mag-action/{post_id}', 'App\Http\Controllers\BlogController@deleteMagAction')->name("delete_mag_action");


//EXTRA PAGES

Route::get('domain-search', 'App\Http\Controllers\ExtraController@domainSearch')->name("domain_search");
Route::post('domain-search-action', 'App\Http\Controllers\ExtraController@domainSearchAction')->name("domain_search_action");
Route::get('domain-result/{finder}', 'App\Http\Controllers\ExtraController@domainResult')->name("domain_result");



Route::get('/mag', 'App\Http\Controllers\BlogController@mag')->name("mag");







//API TRANSLATE TO MY SITE (START)
Route::get('/get-weather-kalia', 'App\Http\Controllers\WeatherApiController@rapidGetWeatherKalia')->name("get_weather_kalia");
//API TRANSLATE TO MY SITE (END)
