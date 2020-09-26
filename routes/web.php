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
    // admin admin admin admin admin admin admin
});



// auth
Route::post('/login-token', 'App\Http\Controllers\LoginController@LoginToken')->name("login_token");
Route::post('/login-token-action', 'App\Http\Controllers\LoginController@LoginTokenAction')->name("login_token_action");
Route::get('/logout', 'App\Http\Controllers\LoginController@Logout')->name("logout");



// profile
Route::middleware(['auth'])->prefix("profile")->group(function () {
    Route::get('/', 'App\Http\Controllers\ProfileController@Index')->name("profile_index");
    Route::get('/add-product', 'App\Http\Controllers\ProfileController@AddProduct')->name("profile_add_product");
    Route::post('/add-product-action', 'App\Http\Controllers\ProfileController@AddProductAction')->name("add_product_action");
    Route::get('/delete-product-action/{id}', 'App\Http\Controllers\ProfileController@DeleteProductAction')->name("delete_product_action");
    Route::get('/view-product-single', 'App\Http\Controllers\ProfileController@ViewProductSingle')->name("view_product_single");
    Route::get('/edit', 'App\Http\Controllers\ProfileController@ProfileEdit')->name("profile_edit");
    Route::post('/edit-action', 'App\Http\Controllers\ProfileController@ProfileEditAction')->name("profile_edit_action");
});
