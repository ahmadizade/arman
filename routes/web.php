<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider
within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// home
Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home");


// auth
Route::post('/login-token', 'App\Http\Controllers\LoginController@loginToken')->name("login_token");
Route::post('/login-token-action', 'App\Http\Controllers\LoginController@loginTokenAction')->name("login_token_action");
