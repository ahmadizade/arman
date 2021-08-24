<?php

namespace App\Http\Controllers;

use App\Jobs\Sms;
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
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function register(){
        return view('auth.register');
    }

    public function login(){
        return view('auth.login');
    }

    public function changePassword(){
        return view('auth.change_password');
    }

    public function loginAction(Request $request){
        $request = $request->replace(self::faToEn($request->all()));
        $mobile = self::faToEn($request->mobile);
        $code = self::faToEn($request->code);
        $validate = Validator::make($request->all(), [
            'mobile' => 'required|digits:11|regex:/(09)[0-9]{9}/',
            'code' => 'required'
        ]);
        if ($validate->fails()) {
            return Response::json(["status" => "0","desc" => $validate->getMessageBag()->first()]);
        }
        $user = User::where("mobile",$mobile)->where("status",1)->first();
        if(isset($user->id)) {
            if (Hash::check($code,$user->password) || $code == $user->password) {
                Auth::loginUsingId($user->id, true);
                Cache::forget("mobile_code_".$mobile);
                return Response::json(["status" => "1", "desc" => "به فروشگاه Cioshop خوش آمدید"]);
            }
            return Response::json(["status" => "0","desc" => "رمز عبور شما اشتباه می باشد"]);
        }
        return Response::json(["status" => "0","desc" => "برای ورود ابتدا باید ثبت نام کنید!"]);
    }

    public function registerAction(Request $request){
        $request = $request->replace($this->faToEn($request->all()));

        $mobile = $request->mobile;

//        if(!Cache::has("mobile_code_".$mobile)) {
            if ($request->customCheck3 == "on"){
                $validate = Validator::make($request->all(), [
                    'mobile' => 'required|digits:11|regex:/(09)[0-9]{9}/',
                ]);

                if ($validate->fails()) {
                    return Response::json(["status" => "0", "desc" => "شماره موبایل وارد شده اشتباه می باشد"]);
                }

                $checkUser = User::where("mobile", $mobile)->first();

                if (isset($checkUser->id)) {
                    // Go To login Page
                    return Response::json(['status' => "0" , 'desc' => "شما قبلا ثبت نام کرده اید"]);
                }else {
                    $code = random_int(1000, 9999);
                    $dataSms = array(
                        array(
                            "Parameter" => "VerificationCode",
                            "ParameterValue" => $code,
                        ),
                        array(
                            "Parameter" => "Company",
                            "ParameterValue" => "آرمان",
                        )
                    );
                    Sms::dispatch($mobile, $dataSms, '53056');
                    Cache::put("mobile_code_" . $mobile, [$code, Carbon::now()->addSeconds(120)], 120);

                    return Response::json(['status' => 1, 'desc' => "کد پنج رقمی به شماره موبایل شما ارسال شد", 'mobile' => $mobile, 'code' => $code]);
                }
            }else{
                return Response::json(['status' => 0 , 'desc' => "تایید شرایط و قوانین، الزامی می باشد"]);
            }
        }
//        else{
//            $time = Cache::get("mobile_code_" . $mobile);
//            $time = Carbon::now()->diffInSeconds(Carbon::parse($time[1]));
//            return Response::json(["status" => "0","desc" => "لطفا ".$time." ثانیه دیگر تلاش کنید"]);
//        }

    public function oneTimeCode(Request $request){

        $request = $request->replace(self::faToEn($request->all()));

        $mobile = $request->mobile;

        if(!Cache::has("mobile_code_".$mobile)) {
                $validate = Validator::make($request->all(), [
                    'mobile' => 'required|digits:11|regex:/(09)[0-9]{9}/',
                ]);

                if ($validate->fails()) {
                    return Response::json(["status" => "0", "desc" => "شماره موبایل وارد شده اشتباه می باشد"]);
                }

                $checkUser = User::where("mobile", $mobile)->first();

                if (isset($checkUser->id)) {

                    $code = random_int(1000, 9999);
                    $dataSms = array(
                        array(
                            "Parameter" => "VerificationCode",
                            "ParameterValue" => $code,
                        ),

                        array(
                            "Parameter" => "Company",
                            "ParameterValue" => "CioShop",
                        ),
                    );
                    Sms::dispatch($mobile, $dataSms, '53056');
                    Cache::put("mobile_code_" . $mobile, [$code, Carbon::now()->addSeconds(120)], 120);
                    return Response::json(['status' => 1, 'desc' => "رمز یکبار مصرف به شماره موبایل شما ارسال شد", 'mobile' => $mobile, 'code' => $code]);
                }else {
                    return Response::json(['status' => 0, 'desc' => "ابتدا در سایت ثبت نام کنید"]);
                }
        }else{
            $time = Cache::get("mobile_code_" . $mobile);
            $time = Carbon::now()->diffInSeconds(Carbon::parse($time[1]));
            return Response::json(["status" => "0","desc" => "لطفا ".$time." ثانیه دیگر تلاش کنید"]);
        }
    }

    public function verifiedCodeAction(Request $request){
        $request = $request->replace(self::faToEn($request->all()));

        $mobile = self::faToEn($request->mobile);
        $code = self::faToEn($request->code);
        $name = self::faToEn($request->name);
        $family = self::faToEn($request->family);

        $validate = Validator::make($request->all(), [
            'mobile' => 'required|digits:11|regex:/(09)[0-9]{9}/',
            'code' => 'required',
            'name' => 'required|min:3|max:40',
            'family' => 'required|min:4|max:70',
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
                        "role" => "user",
                        "name" => $name,
                        "family" => $family,
                        "mobile" => $mobile,
                        "email" => "",
                        "status" => 1,
                        "password" => "",
                        "remember_token" => "",
                        "created_at" => Carbon::now(),
                        "updated_at" => Carbon::now(),
                    ]);
                    Profile::create([
                        "user_id" => $user,
                        "created_at" => \Carbon\Carbon::now(),
                        "updated_at" => \Carbon\Carbon::now(),
                    ]);
                    Auth::loginUsingId($user, true);
                    Cache::forget("mobile_code_".$mobile);
                    return Response::json(["status" => "1"]);
                }
            }
            return Response::json(["status" => "0","desc" => "کد وارد شده اشتباه می باشد"]);
        }
        return Response::json(["status" => "0","desc" => "کد وارد شده اشتباه می باشد"]);
    }

    public function changePasswordAction(Request $request){
        $validate = Validator::make($request->all(), [
            'old_password' => 'required|min:6|max:64',
            'password' => 'required|min:6|max:64',
            'confirm_password' => 'required_with:password|same:password|min:6|max:64',
        ]);
        if ($validate->fails()) {
            Session::flash("error" , $validate->getMessageBag()->first());
            return back();
        }

        $check = User::where("id", Auth::id())->first();
        if ($check->password_changed == 1 && !Hash::check($request->old_password, $check->password)) {
            Session::flash("error" , "رمز عبور فعلی اشتباه است");
            return back();
        }
        elseif($request->password === $request->confirm_password){
            $remember_token = "cioce" . Str::random(1,1000000);
            User::where("id", Auth::id())->update([
                "password" => Hash::make($request->password),
                "password_changed" => 1,
                "remember_token" => $remember_token,
                "updated_at" => Carbon::now(),
            ]);
            Session::flash("status" , "رمز عبور با موفقیت تغییر یافت");
            return view('home');
        }
    }

    public function Logout(){

        if(Auth::check()){

            Auth::logout();

            return Redirect::route("home");

        }

    }

}
