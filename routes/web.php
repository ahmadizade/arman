<?php

use Illuminate\Support\Facades\Route;

// home
Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home");


// admin
Route::middleware(['admin'])->prefix("tahator")->group(function () {
    Route::get('/', 'App\Http\Controllers\AdminController@tahator')->name("tahator");
    Route::get('/login', 'App\Http\Controllers\AdminController@tahator_login')->name("tahator_login");
    Route::post('/login-action', 'App\Http\Controllers\AdminController@AdminLoginAction')->name("admin_login_action")->middleware("ajax","verify.domain");;
    Route::get('/register', 'App\Http\Controllers\AdminController@tahator_register')->name("tahator_register");
    Route::post('/search-user', 'App\Http\Controllers\AdminController@search_user')->name("search_user");
    Route::post('/save-user', 'App\Http\Controllers\AdminController@save_user')->name("save_user");
    Route::get('/admin-users', 'App\Http\Controllers\AdminController@AdminUsers')->name("Admin_Users");
    Route::get('/admin-users/get-user', 'App\Http\Controllers\AdminController@GetUser')->name("get_user");
    Route::post('/admin-users/delete-user', 'App\Http\Controllers\AdminController@DeleteUserAction')->name("delete_user_action")->middleware("ajax","verify.domain");;
    Route::post('/admin-users/edit-user', 'App\Http\Controllers\AdminController@EditUserAction')->name("edit_user_action")->middleware("ajax","verify.domain");;
    Route::get('/credit', 'App\Http\Controllers\AdminController@Credit')->name("credit");
    Route::get('/credit-suggestion-action', 'App\Http\Controllers\AdminController@SuggestionAction')->name("suggestion_action");
    Route::post('/credit-show-action', 'App\Http\Controllers\AdminController@CreditShowAction')->name("credit_show_action");
});
// admin

//QR.Code Generator
Route::post('/code-generator', 'App\Http\Controllers\CodeController@Code_Generator')->name("code_generator")->middleware("auth");


// auth
Route::post('/login-token', 'App\Http\Controllers\LoginController@LoginToken')->name("login_token")->middleware("ajax","verify.domain");
Route::post('/login-token-action', 'App\Http\Controllers\LoginController@LoginTokenAction')->name("login_token_action")->middleware("ajax","verify.domain");
Route::post('/login-password-action', 'App\Http\Controllers\LoginController@LoginPasswordAction')->name("login_password_action")->middleware("ajax","verify.domain");
Route::post('/login-token-password', 'App\Http\Controllers\LoginController@LoginTokenPassword')->name("login_token_password")->middleware("ajax","verify.domain");
Route::get('/logout', 'App\Http\Controllers\LoginController@Logout')->name("logout")->middleware("auth");


// profile
Route::middleware(['auth'])->prefix("profile")->group(function () {
    Route::get('/', 'App\Http\Controllers\ProfileController@Index')->name("profile_index");
    Route::get('/products', 'App\Http\Controllers\ProfileController@products')->name("profile_products")->middleware("supplier");
    Route::get('/add-product', 'App\Http\Controllers\ProfileController@AddProduct')->name("profile_add_product")->middleware("supplier");
    Route::post('/add-product-action', 'App\Http\Controllers\ProfileController@AddProductAction')->name("add_product_action")->middleware("supplier");
    Route::get('/edit-product/{id}', 'App\Http\Controllers\ProfileController@EditProductSingle')->name("profile_edit_product")->middleware("supplier");
    Route::post('/edit-product-action', 'App\Http\Controllers\ProfileController@EditProductSingleAction')->name("edit_product_action")->middleware("supplier");
    Route::post('/delete-product-action', 'App\Http\Controllers\ProfileController@DeleteProductAction')->name("delete_product_action")->middleware("supplier");
    Route::get('/edit', 'App\Http\Controllers\ProfileController@ProfileEdit')->name("profile_edit");
    Route::post('/edit-action', 'App\Http\Controllers\ProfileController@ProfileEditAction')->name("profile_edit_action");
    Route::get('/gold', 'App\Http\Controllers\ProfileController@ProfileGold')->name("profile_gold");
    Route::post('/gold-action', 'App\Http\Controllers\ProfileController@ProfileGoldAction')->name("profile_gold_action");
    Route::get('/store', 'App\Http\Controllers\ProfileController@Store')->name("store");
});


// shop
Route::prefix("shop")->group(function () {
    Route::get('/product/{id}', 'App\Http\Controllers\ShopController@ProductSingle')->name("shop_product_single");
});
