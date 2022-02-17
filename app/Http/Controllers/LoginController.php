<?php

namespace App\Http\Controllers;

use App\Jobs\Sms;
use App\Models\OrderProducts;
use App\Models\Orders;
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
        return view('auth.change_password', ["user" => Auth::user() , 'menu' => "password"]);
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
            if (Hash::check($request->code, $user->password)) {
                Auth::loginUsingId($user->id, true);
                Cache::forget("mobile_code_".$mobile);
                return Response::json(["status" => "1", "desc" => "به فروشگاه آرمان ماسک خوش آمدید"]);
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

                    return Response::json(['status' => 1, 'desc' => "کد چهار رقمی به شماره موبایل شما ارسال شد", 'mobile' => $mobile, 'code' => $code]);
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
                            "ParameterValue" => "ArmanMask",
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
            Session::flash("errors" , $validate->errors()->first());
            return back();
        }

        $check = User::where("id", Auth::id())->first();
        if ($check->password_changed == 1 && !Hash::check($request->old_password, $check->password)) {
            Session::flash("errors" , "رمز عبور فعلی اشتباه است");
            return back();
        }
        elseif($request->password === $request->confirm_password){
            $remember_token = "armanmask" . Str::random(1,1000000);
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

    public function shippingRegisterAction(Request $request){
        $request = $request->replace($this->faToEn($request->all()));

        $mobile = $request->mobile;

//        if(!Cache::has("mobile_code_".$mobile)) {
            $validate = Validator::make($request->all(), [
                'mobile' => 'required|digits:11|regex:/(09)[0-9]{9}/',
            ]);

            if ($validate->fails()) {
                return Response::json(["status" => "0", "desc" => "شماره موبایل وارد شده اشتباه می باشد"]);
            }

            $checkUser = User::where("mobile", $mobile)->first();

            if (isset($checkUser->id)) {
                // Go To login Page
                return Response::json(['status' => "0" , 'desc' => "شما قبلا ثبت نام کرده اید و امکان ثبت مجدد وجود ندارد!"]);
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

                return Response::json(['status' => 1, 'desc' => "کد چهار رقمی به شماره موبایل شما ارسال شد", 'mobile' => $mobile, 'code' => $code]);
            }

    }

    public function shippingVerifiedCodeAction(Request $request){

        $request = $request->replace(self::faToEn($request->all()));

        $mobile = self::faToEn($request->mobile);
        $code = self::faToEn($request->code);

        $validate = Validator::make($request->all(), [
            'mobile' => 'required|digits:11|regex:/(09)[0-9]{9}/',
            'code' => 'required',
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
                    return Response::json(["status" => "0"]);
                }else{
                    return Response::json(["status" => "1", 'desc' => "کد وارد شده صحیح می باشد"]);
                }
            }
            return Response::json(["status" => "0","desc" => "کد وارد شده اشتباه می باشد"]);
        }
        return Response::json(["status" => "0","desc" => "کد وارد شده اشتباه می باشد"]);
    }

    public function shippingSignUp(Request $request){
        $request = $request->replace(self::faToEn($request->all()));

        $mobile = self::faToEn($request->mobile);
        $name = self::faToEn($request->name);
        $family = self::faToEn($request->family);
        $address = self::faToEn($request->address);

        $validate = Validator::make($request->all(), [
            'mobile' => 'required|digits:11|regex:/(09)[0-9]{9}/',
            'name' => 'required|min:3|max:40',
            'family' => 'required|min:4|max:70',
            'address' => 'required|min:9|max:512',
        ]);

        if ($validate->fails()) {
            return Response::json(["status" => "0","desc" => "اطلاعات وارد شده صحیح نیستند!"]);
        }

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
            "address" => $address,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        Auth::loginUsingId($user, true);

        if (Session::has('product') && count(Session::get('product')) > 0 && Session::has('shipping') && count(Session::get('shipping')) > 0) {
            $total_price = Session::get('shipping')['total_price'];
            $taxation = Session::get('shipping')['taxation'];
            $price_with_taxation = Session::get('shipping')['price_with_taxation'];
            $order_number = 'A.M-' . mt_rand(1, 90000) .'-'. Auth::id();
            $product_count = count(Session::get('product'));
            $id = Orders::create([
                'user_id' => Auth::id(),
                'last_price' => $total_price,
                'last_discount' => $taxation,
                'price_with_taxation' => $price_with_taxation,
                'status' => 1,
                'product_count' => $product_count,
                'status_payment' => 1,
                'order_number' => $order_number,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => Carbon::now(),
            ])->id;

            foreach(Session::get('product') as $item)
            {
                OrderProducts::create([
                    'user_id' => Auth::id(),
                    'order_id' => $id,
                    'product_id' => $item->id,
                    'product_name' => $item->product_name,
                    'product_price' => $item->price,
                    'total_price' => $item->total_price,
                    'discount' => $item->discount,
                    'product_quantity' => $item->order_quantity ,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
            //SMS
            $mobile = '09128757868';
            $code = $order_number;
            $dataSms = array(
                array(
                    "Parameter" => "OrderNumber",
                    "ParameterValue" => $code,
                ),

                array(
                    "Parameter" => "User",
                    "ParameterValue" => Auth::user()->name . " " . Auth::user()->family,
                ),
                array(
                    "Parameter" => "mobile",
                    "ParameterValue" => Auth::user()->mobile,
                ),
            );
            Sms::dispatch($mobile, $dataSms, '61304');

            Session::forget('product');
            Session::forget('shipping');
            return Response::json(['status' => '1', 'desc' =>'سفارش شما با موفقیت ثبت شد.']);

        } else {
            return Response::json(['status' => '0', 'desc' => "سبد خرید خود را مجدد تایید فرمایید!"]);
        }


        Cache::forget("mobile_code_".$mobile);
        return Response::json(["status" => "1" , 'desc' => "سفارش شما با موفقیت ثبت شد."]);
    }


    public function Logout(){

        if(Auth::check()){

            Auth::logout();

            return Redirect::route("home");

        }

    }

}
