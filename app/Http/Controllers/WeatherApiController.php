<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherApiController extends Controller
{
    public function rapidGetWeather($q){
        $ctn = 1;

        $curl = curl_init();

        curl_setopt_array($curl, [
//            CURLOPT_URL => "https://community-open-weather-map.p.rapidapi.com/find?q=london&cnt=1&mode=null&lon=0&type=link%2C%20accurate&lat=0&units=imperial%2C%20metric",
            CURLOPT_URL => "https://community-open-weather-map.p.rapidapi.com/find?q=$q",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "x-rapidapi-host: community-open-weather-map.p.rapidapi.com",
                "x-rapidapi-key: 1174fb03fbmshef5fc1bf2d89aadp15adf0jsn94873d73a4af"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
}
