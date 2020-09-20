<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginToken(Request $request){

        $mobile = self::faToEn($request->mobile);

        if(isset($mobile) && strlen($mobile) == 11){
            self::sms($mobile,"کد ورود شما به سایت ثمین تخفیف ".
                "\n".
                "code: ".rand(10000,99999)
            );
        }

        return '0';

    }
}
