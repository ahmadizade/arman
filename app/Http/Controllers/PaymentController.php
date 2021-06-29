<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use SoapClient;

class PaymentController extends Controller
{

    public static function payment($amount)
    {

        $data = array("merchant_id" => "365d4e5d-d4b4-4a47-89a4-9843791b0cfd",
            "amount" => $amount * 10,
            "callback_url" => route("verify"),
            "description" => Str::random(6),
            "metadata" => ["email" => Auth::user()->email ?? "info@cioce.ir", "mobile" => Auth::user()->mobile],
        );

        $jsonData = json_encode($data);
        $ch = curl_init('https://api.zarinpal.com/pg/v4/payment/request.json');
        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));

        $result = curl_exec($ch);
        $err = curl_error($ch);
        $result = json_decode($result, true, JSON_PRETTY_PRINT);
        curl_close($ch);


        if ($err) {
            return back();
        } else {
            if (empty($result['errors'])) {
                if ($result['data']['code'] == 100 && $result['data']['message'] == "Success") {

                    DB::table("orders")->where("user_id",Auth::id())->where("id",$check->id)->update(["ref_number_bank" => $result['data']['authority']]);

                    $checkPayment = DB::table("payment")->where("user_id",Auth::id())->where("order_id",$check->id)->exists();
                    if($checkPayment){
                        DB::table("payment")->where("order_id",$check->id)->update([
                            "user_id" => Auth::id(),
                            "final_price" => $check->last_price,
                            "status" => "PENDING",
                            "date" => \Illuminate\Support\Carbon::now(),
                            "ref_number_bank" => $result['data']['authority'],
                            "type" => "ONLINE-PAYMENT",
                        ]);
                    }else{
                        DB::table("payment")->insert([
                            "user_id" => Auth::id(),
                            "order_id" => $check->id,
                            "final_price" => $check->last_price,
                            "status" => "PENDING",
                            "date" => Carbon::now(),
                            "ref_number_bank" => $result['data']['authority'],
                            "type" => "ONLINE-PAYMENT",
                        ]);
                    }
                    return Redirect::to("https://www.zarinpal.com/pg/StartPay/" . $result['data']['authority']);
                }
            }
            return back();
        }

    }

    public function verify(Request $request){

        if(isset($request->Authority)){

            $ref = $request->Authority;

            $checkPayment = DB::table("payment")
                ->where("ref_number_bank",$ref)
                ->where("status","PENDING")
                ->where("user_id",Auth::id())
                ->where("type","ONLINE-PAYMENT")
                ->first();

            if(isset($checkPayment->id) && $checkPayment->status == "PENDING"){
                $Authority = $ref;
                $data = array("merchant_id" => "365d4e5d-d4b4-4a47-89a4-9843791b0cfd", "authority" => $Authority, "amount" => $checkPayment->final_price * 10);
                $jsonData = json_encode($data);
                $ch = curl_init('https://api.zarinpal.com/pg/v4/payment/verify.json');
                curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v4');
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($jsonData)
                ));

                $result = curl_exec($ch);
                curl_close($ch);
                $result = json_decode($result, true);

                if (empty($result['errors'])) {
                    if(isset($result['data']) && ($result['data']['code'] == 100 || $result['data']['code'] == 101) && Str::length($result['data']['ref_id']) > 2){

                        DB::table("payment")
                            ->where("ref_number_bank",$ref)
                            ->where("status","PENDING")
                            ->where("user_id",Auth::id())
                            ->where("type","ONLINE-PAYMENT")
                            ->update([
                                "status" => "PAYED",
                                "json_result" => json_encode($result),
                            ]);

                        DB::table("orders")->where("user_id",Auth::id())->where("ref_number_bank",$ref)->update([
                            "status_payment" => "PAYED",
                        ]);

                        self::log(Auth::id(), "پرداخت بانکی", "پرداخت جدیدی با شماره رهگیری ".$ref." انجام شد","payment_online_payment");

                        Session::forget("shipping");
                        Session::forget("product");

                        return view("payment_confirm",["ref" => $result['data']['ref_id'] , "id" => $checkPayment->order_id]);

                    }else{

                        return view("payment_not_confirm");

                    }
                }

                return view("payment_not_confirm");

            }

            return Redirect::route("index");

        }

        return Redirect::route("index");

    }

}
