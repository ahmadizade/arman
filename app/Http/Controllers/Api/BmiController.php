<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;


class BmiController extends Controller
{

    public static function index($query , $q){

        if(isset($q) && $q == "query" && is_numeric($query->weight) && $query->weight > 0 && isset($query->height) && is_numeric($query->height) && $query->height > 0){

            $weight = $query->weight;
            $height = $query->height;
            $result = null;

            $result['valid'] = true;
            $result['weight'] = $weight;
            $result['height'] = $height;

            $result['bmi'] = $weight / ($height*$height) * 10000;
            $result['bmi'] = round($result['bmi']);

            if($result['bmi'] < 15){
                $result['description'] = 'شما دچار کمبود وزن شدید و خطرناک هستید';
            }else if($result['bmi'] >= 15 && $result['bmi'] < 16){
                $result['description'] = 'شما دچار کمبود وزن شدید هستید';
            }else if($result['bmi'] >= 16 && $result['bmi'] < 18.5){
                $result['description'] = 'شما دچار کمبود وزن هستید';
            }else if($result['bmi'] >= 18.5 && $result['bmi'] < 25){
                $result['description'] = 'شما وزنی طبیعی دارید';
            }else if($result['bmi'] >= 25 && $result['bmi'] < 30){
                $result['description'] = 'شما دچار اضافه وزن هستید';
            }else if($result['bmi'] >= 30 && $result['bmi'] < 35){
                $result['description'] = 'شما دچار اضافه وزن نوع 1 هستید';
            }else if($result['bmi'] >= 35 && $result['bmi'] < 40){
                $result['description'] = 'شما دچار اضافه وزن نوع 2 خطرناک هستید';
            }else if($result['bmi'] >= 40 ) {
                $result['description'] = 'شما دچار اضافه وزن نوع 3 بسیار خطرناک هستید';
            }

            $result['min'] = round(((($height*$height)/10000)*22)-5);
            $result['max'] = round(((($height*$height)/10000)*22)+4);

            $result['weight'] = \Morilog\Jalali\CalendarUtils::convertNumbers($result['weight'],true);
            $result['height'] = \Morilog\Jalali\CalendarUtils::convertNumbers($result['height'],true);
            $result['bmi'] = \Morilog\Jalali\CalendarUtils::convertNumbers($result['bmi'],true);
            $result['min'] = \Morilog\Jalali\CalendarUtils::convertNumbers($result['min'],true);
            $result['max'] = \Morilog\Jalali\CalendarUtils::convertNumbers($result['max'],true);

            return response()->json(["status" => 200 , "result" => $result , "description" => null]);

        }

        return response()->json(["status" => 200 , "result" => null , "description" => "لطفا اطلاعات را درست وارد نمایید"]);

    }


}
