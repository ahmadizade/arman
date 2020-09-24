<?php

use Illuminate\Support\Facades\Route;

// home
Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home");



// admin admin admin admin admin admin admin
Route::middleware(['auth'])->prefix("tahato")->group(function () {
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
    Route::get('/add-product', 'App\Http\Controllers\ProfileController@AddProduct')->name("profile_add_product");
    Route::get('/', 'App\Http\Controllers\ProfileController@Index')->name("profile_index");
    Route::get('/profile-edit', 'App\Http\Controllers\ProfileController@ProfileEdit')->name("profile_edit");
});
