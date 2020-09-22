<?php

use Illuminate\Support\Facades\Route;

// home
Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home");

// admin admin admin admin admin admin admin
Route::get('/tahator', 'App\Http\Controllers\AdminController@tahator')->name("tahator");
Route::get('/tahator/login', 'App\Http\Controllers\AdminController@tahator_login')->name("tahator_login");
Route::get('/tahator/register', 'App\Http\Controllers\AdminController@tahator_register')->name("tahator_register");
// admin admin admin admin admin admin admin


// auth
Route::post('/login-token', 'App\Http\Controllers\LoginController@loginToken')->name("login_token");
Route::post('/login-token-action', 'App\Http\Controllers\LoginController@loginTokenAction')->name("login_token_action");
Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name("logout");


Route::middleware(['auth'])->prefix("profile")->group(function () {
    Route::get('/', 'App\Http\Controllers\ProfileController@index')->name("profile_index");
    Route::get('/profile-edit', 'App\Http\Controllers\ProfileController@profileEdit')->name("profile_edit");
});
