<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AbjadController extends Controller
{

    public static function index($q){

        if(isset($q) && strlen($q) > 0){

            $name = $q;
            $result['valid'] = true;
            $result['name'] = $name;
            $result['abjad'] = self::abjad($name);
            $result['abjad'] = \Morilog\Jalali\CalendarUtils::convertNumbers($result['abjad'],true);

            if($result['abjad'] == 0){
                return response()->json(["status" => 200 , "result" => $result , "description" => "اعداد  و یا حروف غیر فارسی , ابجد ندارند"]);
            }
            return response()->json(["status" => 200 , "result" => $result , "description" => null]);

        }else{

            return response()->json(["status" => 200 , "result" => null , "description" => "حرف یا کلمه فارسی خود را وارد نمایید"]);

        }

    }

    public static function abjad($name){

        $nName = mb_strlen($name);
        $x = 0;
        for($i=0;$i<$nName;$i++){
            $sum[] = mb_substr($name, $i, 1, 'UTF-8');

            if($sum[$i] == 'ا' || $sum[$i]=='آ'){
                $x+=1;
            }else{echo"";}
            if($sum[$i] == 'ب' || $sum[$i] == 'پ'){
                $x+=2;
            }else{echo"";}
            if($sum[$i] == 'ج' || $sum[$i] == 'چ'){
                $x+=3;
            }else{echo"";}
            if($sum[$i] == 'د'){
                $x+=4;
            }else{echo"";}
            if($sum[$i] == 'ه'){
                $x+=5;
            }else{echo"";}
            if($sum[$i] == 'و'){
                $x+=6;
            }else{echo"";}
            if($sum[$i] == 'ز' || $sum[$i] == 'ژ'){
                $x+=7;
            }else{echo"";}
            if($sum[$i] == 'ح'){
                $x+=8;
            }else{echo"";}
            if($sum[$i] == 'ط'){
                $x+=9;
            }else{echo"";}
            if($sum[$i] == 'ی'){
                $x+=10;
            }else{echo"";}
            if($sum[$i] == 'ک' || $sum[$i] == 'گ'){
                $x+=20;
            }else{echo"";}
            if($sum[$i] == 'ل'){
                $x+=30;
            }else{echo"";}
            if($sum[$i] == 'م'){
                $x+=40;
            }else{echo"";}
            if($sum[$i] == 'ن'){
                $x+=50;
            }else{echo"";}
            if($sum[$i] == 'س'){
                $x+=60;
            }else{echo"";}
            if($sum[$i] == 'ع'){
                $x+=70;
            }else{echo"";}
            if($sum[$i] == 'ف'){
                $x+=80;
            }else{echo"";}
            if($sum[$i] == 'ص'){
                $x+=90;
            }else{echo"";}
            if($sum[$i] == 'ق'){
                $x+=100;
            }else{echo"";}
            if($sum[$i] == 'ر'){
                $x+=200;
            }else{echo"";}
            if($sum[$i] == 'ش'){
                $x+=300;
            }else{echo"";}
            if($sum[$i] == 'ت'){
                $x+=400;
            }else{echo"";}
            if($sum[$i] == 'ث'){
                $x+=500;
            }else{echo"";}
            if($sum[$i] == 'خ'){
                $x+=600;
            }else{echo"";}
            if($sum[$i] == 'ذ'){
                $x+=700;
            }else{echo"";}
            if($sum[$i] == 'ض'){
                $x+=800;
            }else{echo"";}
            if($sum[$i] == 'ظ'){
                $x+=900;
            }else{echo"";}
            if($sum[$i] == 'غ'){
                $x+=1000;
            }else{echo"";}
        }

        return $x;
    }

}
