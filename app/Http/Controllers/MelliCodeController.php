<?php

namespace App\Http\Controllers;

use App\Models\MelliCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class MelliCodeController extends Controller
{

    public static function index($q){

        if(isset($q)){

            $melliCode = $q;
            $result = null;
            if(strlen(\Morilog\Jalali\CalendarUtils::convertNumbers($melliCode,true)) == 10){
                if(self::melliCode(\Morilog\Jalali\CalendarUtils::convertNumbers($melliCode,true))){
                    $result['valid'] = true;
                    $result["city"] = "";

                    $melliCode = \Morilog\Jalali\CalendarUtils::convertNumbers($melliCode,true);

                    if(!Cache::has("melliCodeCity")){
                        $melliCodeCity = MelliCode::all()->keyBy("city_code");
                        Cache::put("melliCodeCity",$melliCodeCity,86400);
                    }else{
                        $melliCodeCity = Cache::get("melliCodeCity");
                    }

                    foreach ($melliCodeCity as $key => $value){
                        $ex = explode("-",$key);
                        foreach ($ex as $item){
                            if($item == substr($melliCode,0,3)){
                                $result["city"] = strlen($result["city"]) > 0 ? $result["city"]." - " : "";
                                $result["city"] = $melliCodeCity[$key]['city_name'];
                            }
                        }
                    }
                    return response()->json(["status" => 200 , "result" => $result , "description" => "کد ملی معتبر میباشد"]);
                }else{
                    $result['valid'] = false;
                    $result["city"] = "";
                    return response()->json(["status" => 200 , "result" => $result , "description" => "کد ملی نامعتبر میباشد"]);
                }
            }else{
                return response()->json(["status" => 200 , "result" => null , "description" => "کد ملی باید 10 رقم باشد"]);
            }

        }

    }

    public static function melliCode($input){

        if (!preg_match("/^\d{10}$/", $input)
            || $input=='0000000000'
            || $input=='1111111111'
            || $input=='2222222222'
            || $input=='3333333333'
            || $input=='4444444444'
            || $input=='5555555555'
            || $input=='6666666666'
            || $input=='7777777777'
            || $input=='8888888888'
            || $input=='9999999999') {
            return false;
        }
        $check = (int) $input[9];
        $sum = array_sum(array_map(function ($x) use ($input) {
                return ((int) $input[$x]) * (10 - $x);
            }, range(0, 8))) % 11;
        return ($sum < 2 && $check == $sum) || ($sum >= 2 && $check + $sum == 11);

    }

}
