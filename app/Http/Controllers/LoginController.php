<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function loginToken(Request $request){

        $mobile = self::faToEn($request->mobile);

        $validate = Validator::make($request->all(), [
            'mobile' => 'required|digits:11',
        ]);

        if ($validate->fails()) {
            return Response::json(["status" => "0","desc" => "شماره موبایل اشتباه می باشد"]);
        }

        $code = 00000; //rand(10000,99999);

       /* self::sms($mobile,"کد ورود شما به سایت ثمین تخفیف ".
            "\n".
            "code: ".$code
        );*/

        Cache::put("mobile_code_".$mobile,$code,60);

        return view("auth.login",["mobile" => $mobile]);

    }

    public function loginTokenAction(Request $request){

        $mobile = self::faToEn($request->mobile);
        $code = self::faToEn($request->code);

        $validate = Validator::make($request->all(), [
            'mobile' => 'required|digits:11',
            'code' => 'required|digits:5'
        ]);

        if ($validate->fails()) {
            return Response::json(["status" => "0","desc" => "کد وارد شده اشتباه می باشد"]);
        }

        if(Cache::has("mobile_code_".$mobile)){
            if(Cache::get("mobile_code_".$mobile) == $code){

                if(User::where("mobile",$mobile)->exists()){
                    // login

                    $user = User::where("mobile",$mobile)->first();
                    Auth::loginUsingId($user->id, true);

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

                    Profile::create([
                        "user_id" => $user
                    ]);

                    Auth::loginUsingId($user, true);

                    return Response::json(["status" => "1"]);

                }

            }

            return Response::json(["status" => "0","desc" => "کد وارد شده اشتباه می باشد"]);

        }

        return Response::json(["status" => "0","desc" => "کد وارد شده اشتباه می باشد"]);

    }

    public function logout(){

        if(Auth::check()){

            Auth::logout();

            return Redirect::route("home");

        }

    }

}
