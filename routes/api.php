<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Weather API From RapidApi
Route::prefix("weather")->group(function () {

    //*** We Get From OutSide ***\\
    Route::get('/rapid-get-weather/{q}', 'App\Http\Controllers\WeatherApiController@rapidGetWeather')->name("rapid_get_weather");
    //*** We Give To people ***\\
    Route::get('/open-weather/{q}', 'App\Http\Controllers\WeatherApiController@openWeather')->name("open_weather");

});


Route::prefix("melli-cart")->group(function () {
    Route::get('/{q}', 'App\Http\Controllers\MelliCodeController@index')->name("melli_cart");
});


Route::get('/get-article', 'App\Http\Controllers\ApiController@getArticle')->name("get_article");


