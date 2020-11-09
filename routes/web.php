<?php

use Illuminate\Support\Facades\Route;

// home
Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home");
Route::get('/contact', 'App\Http\Controllers\HomeController@contact')->name("contact");
Route::post('/contact-action', 'App\Http\Controllers\HomeController@contactAction')->name("contact_action");
Route::get('/about-us', 'App\Http\Controllers\HomeController@AboutUs')->name("About_Us");
//MAIL
Route::get('/verify-email', 'App\Http\Controllers\Controller@build_mail')->name('build_mail');
// admin
Route::middleware(['admin'])->prefix("tahator")->group(function () {
    Route::get('/', 'App\Http\Controllers\AdminController@tahator')->name("tahator");
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
    Route::post('/product/product-save-action', 'App\Http\Controllers\AdminController@ProductSaveAction')->name("product_save_action")->middleware("ajax", "verify.domain");
});
// admin


//QR.Code Generator
Route::get('/code-generator', 'App\Http\Controllers\CodeController@Code_Generator')->name("code_generator")->middleware("auth");


// auth
Route::post('/login-token', 'App\Http\Controllers\LoginController@LoginToken')->name("login_token")->middleware("ajax", "verify.domain");
Route::post('/login-token-action', 'App\Http\Controllers\LoginController@LoginTokenAction')->name("login_token_action")->middleware("ajax", "verify.domain");
Route::post('/login-password-action', 'App\Http\Controllers\LoginController@LoginPasswordAction')->name("login_password_action")->middleware("ajax", "verify.domain");
Route::post('/login-token-password', 'App\Http\Controllers\LoginController@LoginTokenPassword')->name("login_token_password")->middleware("ajax", "verify.domain");
Route::get('/logout', 'App\Http\Controllers\LoginController@Logout')->name("logout")->middleware("auth");


// profile
Route::middleware(['auth'])->prefix("profile")->group(function () {
    Route::get('/', 'App\Http\Controllers\ProfileController@Index')->name("profile_index");
    Route::get('/products', 'App\Http\Controllers\ProfileController@Products')->name("profile_products");
    Route::get('/add-product', 'App\Http\Controllers\ProfileController@AddProduct')->name("profile_add_product");
    Route::post('/add-product-action', 'App\Http\Controllers\ProfileController@AddProductAction')->name("add_product_action");
    Route::get('/edit-product/{id}', 'App\Http\Controllers\ProfileController@EditProductSingle')->name("profile_edit_product");
    Route::post('/edit-product-action', 'App\Http\Controllers\ProfileController@EditProductSingleAction')->name("edit_product_action");
    Route::post('/delete-product-action', 'App\Http\Controllers\ProfileController@DeleteProductAction')->name("delete_product_action");
    Route::get('/edit', 'App\Http\Controllers\ProfileController@ProfileEdit')->name("profile_edit");
    Route::post('/edit-action', 'App\Http\Controllers\ProfileController@ProfileEditAction')->name("profile_edit_action");
    Route::get('/gold', 'App\Http\Controllers\ProfileController@ProfileGold')->name("profile_gold");
    Route::post('/gold-online-action', 'App\Http\Controllers\ProfileController@ProfileGoldOnlineAction')->name("profile_gold_online_action");
    Route::post('/gold-credit-action', 'App\Http\Controllers\ProfileController@ProfileGoldCreditAction')->name("profile_gold_credit_action");
    Route::get('/store', 'App\Http\Controllers\ProfileController@Store')->name("profile_store");
    Route::get('/store-bio', 'App\Http\Controllers\ProfileController@StoreBio')->name("profile_bio");
    Route::post('/store-bio-action', 'App\Http\Controllers\ProfileController@StoreBioAction')->name("profile_bio_action");
    Route::post('/store-action', 'App\Http\Controllers\ProfileController@StoreAction')->name("store_action");
    Route::post('/store-edit-action', 'App\Http\Controllers\ProfileController@StoreEditAction')->name("store_edit_action");
    Route::post('/store-desc-action', 'App\Http\Controllers\ProfileController@StoreDescAction')->name("store_desc_action");
    Route::get('/bookmark', 'App\Http\Controllers\ProfileController@Bookmark')->name("profile_bookmark");
    Route::post('/bookmark-delete', 'App\Http\Controllers\ProfileController@BookmarkDelete')->name("profile_bookmark_delete")->middleware("ajax", "verify.domain");
    Route::get('/email-verify-action', 'App\Http\Controllers\ProfileController@EmailVerifyAction')->name('email_verify_action');
    Route::get('/qrcode', 'App\Http\Controllers\ProfileController@Qrcode')->name("profile_qrcode");
    Route::post('/qrcode-action', 'App\Http\Controllers\ProfileController@QrcodeAction')->name("profile_qrcode_action");
});


// shop
Route::prefix("shop")->group(function () {
    Route::get('/{shop}/{branch?}', 'App\Http\Controllers\ShopController@singleShop')->name("single_shop");
    Route::get('/product/{id}', 'App\Http\Controllers\ShopController@ProductSingle')->name("shop_product_single");
    Route::post('/comment-action', 'App\Http\Controllers\ShopController@CommentAction')->name("comment_action")->middleware("ajax", "verify.domain");
    Route::post('/shop-like', 'App\Http\Controllers\ShopController@Like')->name("like")->middleware("ajax", "verify.domain");
    Route::post('/shop-bookmark', 'App\Http\Controllers\ShopController@Bookmark')->name("bookmark")->middleware("ajax", "verify.domain");
    Route::post('/shop-report', 'App\Http\Controllers\ShopController@Report')->name("report")->middleware("ajax", "verify.domain");
});
