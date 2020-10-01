<?php

use Illuminate\Support\Facades\Route;

// home
Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home");


// admin admin admin admin admin admin admin
Route::middleware(['auth'])->prefix("tahator")->group(function () {
    Route::get('/', 'App\Http\Controllers\AdminController@tahator')->name("tahator");
    Route::get('/login', 'App\Http\Controllers\AdminController@tahator_login')->name("tahator_login");
    Route::get('/register', 'App\Http\Controllers\AdminController@tahator_register')->name("tahator_register");
    Route::post('/search-user', 'App\Http\Controllers\AdminController@search_user')->name("search_user");
    Route::post('/save-user', 'App\Http\Controllers\AdminController@save_user')->name("save_user");
});
// admin admin admin admin admin admin admin



// auth
Route::post('/login-token', 'App\Http\Controllers\LoginController@LoginToken')->name("login_token");
Route::post('/login-token-action', 'App\Http\Controllers\LoginController@LoginTokenAction')->name("login_token_action");
Route::get('/logout', 'App\Http\Controllers\LoginController@Logout')->name("logout");



// profile
Route::middleware(['auth'])->prefix("profile")->group(function () {
    Route::get('/', 'App\Http\Controllers\ProfileController@Index')->name("profile_index");
    Route::get('/products', 'App\Http\Controllers\ProfileController@products')->name("profile_products");
    Route::get('/add-product', 'App\Http\Controllers\ProfileController@AddProduct')->name("profile_add_product");
    Route::post('/add-product-action', 'App\Http\Controllers\ProfileController@AddProductAction')->name("add_product_action");
    Route::get('/edit-product/{id}', 'App\Http\Controllers\ProfileController@EditProductSingle')->name("profile_edit_product");
    Route::post('/edit-product-action', 'App\Http\Controllers\ProfileController@EditProductSingleAction')->name("edit_product_action");
    Route::post('/delete-product-action', 'App\Http\Controllers\ProfileController@DeleteProductAction')->name("delete_product_action");
    Route::get('/edit', 'App\Http\Controllers\ProfileController@ProfileEdit')->name("profile_edit");
    Route::post('/edit-action', 'App\Http\Controllers\ProfileController@ProfileEditAction')->name("profile_edit_action");
    Route::get('/gold', 'App\Http\Controllers\ProfileController@ProfileGold')->name("profile_gold");
    Route::post('/gold-action', 'App\Http\Controllers\ProfileController@ProfileGoldAction')->name("profile_gold_action");
});



// shop
Route::prefix("shop")->group(function () {
    Route::get('/product/{id}', 'App\Http\Controllers\ShopController@ProductSingle')->name("shop_product_single");
});
