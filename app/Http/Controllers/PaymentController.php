<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use SoapClient;

class PaymentController extends Controller
{

    public static function redirect_post($url, array $data){

    echo '<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<title>در حال اتصال ...</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
	#main {
	    background-color: #F1F1F1;
	    border: 1px solid #CACACA;
	    height: 90px;
	    left: 50%;
	    margin-left: -265px;
	    position: absolute;
	    top: 200px;
	    width: 530px;
	}
	#main p {
	    color: #757575;
	    direction: rtl;
	    font-family: Arial;
	    font-size: 16px;
	    font-weight: bold;
	    line-height: 27px;
	    margin-top: 30px;
	    padding-right: 60px;
	    text-align: right;
	}
    </style>
        <script type="text/javascript">
            function closethisasap() {
                document.forms["redirectpost"].submit();
            }
        </script>
    </head>
    <body onload="closethisasap();">';
        echo '<form name="redirectpost" method="post" action="'.$url.'">';

        if ( !is_null($data) ) {
            foreach ($data as $k => $v) {
                echo '<input type="hidden" name="' . $k . '" value="' . $v . '"> ';
            }
        }

        echo' </form><div id="main">
    <p>درحال اتصال به درگاه بانک</p></div>
    </body>
    </html>';

    }

    public static function PaymentGold(){

        $invoice_number = Str::random(4)."_".Auth::id();
        $amount = Setting::first()->gold_payment;

        $_SESSION['merchantId'] = self::MerchantId;
        $_SESSION['sha1Key'] = self::sha1Key;
        $_SESSION['admin_email'] = self::admin_email;
        $_SESSION['amount'] = $amount;
        $_SESSION['PayOrderId'] = $invoice_number;
        $_SESSION['fullname'] = Auth::user()->name ?? '';
        $_SESSION['email'] = Auth::user()->email ?? '';
        $revertURL = 'http://localhost:8000/incoming-gold';

        $client = new SoapClient('https://ikc.shaparak.ir/XToken/Tokens.xml', array('soap_version'   => SOAP_1_1));

        $params['amount'] = $_SESSION['amount'];
        $params['merchantId'] = self::MerchantId;
        $params['invoiceNo'] = $invoice_number;
        $params['paymentId'] = "";
        $params['specialPaymentId'] = $invoice_number;
        $params['revertURL'] = $revertURL;
        $params['description'] = "";
        $result = $client->__soapCall("MakeToken", array($params));
        $_SESSION['token'] = $result->MakeTokenResult->token;
        $data['token'] = $_SESSION['token'];
        $data['merchantId'] = $_SESSION['merchantId'];

        Payment::create([
            "user_id" => Auth::id(),
            "invoice_number" => $invoice_number,
            "amount" => $amount,
            "status" => "PENDING",
            "type" => "GOLD",
            "json_result_payment" => "",
            "json_result_verify" => "",
            "token" => $result->MakeTokenResult->token,
            "created_at" => Carbon::now()
        ]);

        return self::redirect_post('https://ikc.shaparak.ir/TPayment/Payment/index',$data);

    }

    public function BackBankGold(Request $request){

        if(isset($request->token) && isset($request->merchantId) && isset($request->InvoiceNumber) && isset($request->amount)){

            if($request->merchantId == self::MerchantId && $request->resultCode === "100" && isset($request->referenceId) && isset($request->cardNo) && isset($request->cno)){

                $checkMerchantId = explode("_",$request->InvoiceNumber);
                $user_id = $checkMerchantId[1];

                if(is_numeric($user_id) && $user_id > 0) {

                    $payment = Payment::where("user_id", $user_id)->where("invoice_number", $request->InvoiceNumber)->where("amount", $request->amount)->first();

                    if (isset($payment->id)) {

                        Payment::where("user_id", $user_id)->where("invoice_number", $request->InvoiceNumber)->where("amount", $request->amount)->update([
                            "json_result_payment" => json_encode($request->all()),
                            "reference_id" => $request->referenceId,
                            "status" => "UNVERIFY",
                        ]);

                        // VERIFY
                        $referenceId = isset($request->referenceId) ? $request->referenceId : 0;
                        $client = new SoapClient('https://ikc.shaparak.ir/XVerify/Verify.xml', array('soap_version' => SOAP_1_1));
                        $params['token'] = $request->token;
                        $params['merchantId'] = $request->merchantId;
                        $params['referenceNumber'] = $referenceId;
                        $params['sha1Key'] = self::sha1Key;
                        $result = $client->__soapCall("KicccPaymentsVerification", array($params));
                        $result = ($result->KicccPaymentsVerificationResult);

                        Payment::where("user_id", $user_id)->where("invoice_number", $request->InvoiceNumber)->where("amount", $request->amount)->update([
                            "json_result_verify" => json_encode($result),
                        ]);

                        if (floatval($result) > 0 && floatval($result) == floatval($payment->amount)) {
                            Payment::where("user_id", $user_id)->where("invoice_number", $request->InvoiceNumber)->where("amount", $request->amount)->update([
                                "status" => "SUCCESS",
                            ]);
                            User::where("id", $user_id)->update([
                                "user_mode" => "gold"
                            ]);
                            return redirect()->route("profile_gold")->with("bankStatus", $payment->reference_id);
                        } else {
                            return redirect()->route("profile_gold")->withErrors("عملیات پرداخت بانکی با موفقیت انجام نشد");
                        }

                    }

                    return redirect()->route("profile_gold")->withErrors("عملیات پرداخت بانکی با موفقیت انجام نشد");

                }

                return redirect()->route("profile_gold")->withErrors("عملیات پرداخت بانکی با موفقیت انجام نشد");

            }

            return redirect()->route("profile_gold")->withErrors("عملیات پرداخت بانکی با موفقیت انجام نشد");

        }

        return redirect()->route("profile_gold")->withErrors("عملیات پرداخت بانکی با موفقیت انجام نشد");

    }

    public function CreditBack(Request $request){

        $request = $request->replace(self::faToEn($request->all()));
        if(isset($request->token) && isset($request->merchantId) && isset($request->InvoiceNumber) && isset($request->amount)){
            if($request->merchantId == self::MerchantId && $request->resultCode === "100" && isset($request->referenceId) && isset($request->cardNo) && isset($request->cno)){
                $checkMerchantId = explode("_",$request->InvoiceNumber);
                $user_id = $checkMerchantId[1];
                if(is_numeric($user_id) && $user_id > 0) {
                    $payment = Payment::where("user_id", $user_id)->where("invoice_number", $request->InvoiceNumber)->where("amount", $request->amount)->first();
                    if (isset($payment->id)) {

                        Payment::where("user_id", $user_id)->where("invoice_number", $request->InvoiceNumber)->where("amount", $request->amount)->update([
                            "json_result_payment" => json_encode($request->all()),
                            "reference_id" => $request->referenceId,
                            "status" => "UNVERIFY",
                        ]);

                        //VERIFY
                        $referenceId = isset($request->referenceId) ? $request->referenceId : 0;
                        $client = new SoapClient('https://ikc.shaparak.ir/XVerify/Verify.xml', array('soap_version' => SOAP_1_1));
                        $params['token'] = $request->token;
                        $params['merchantId'] = $request->merchantId;
                        $params['referenceNumber'] = $referenceId;
                        $params['sha1Key'] = self::sha1Key;
                        $result = $client->__soapCall("KicccPaymentsVerification", array($params));
                        $result = ($result->KicccPaymentsVerificationResult);

                        Payment::where("user_id", $user_id)->where("invoice_number", $request->InvoiceNumber)->where("amount", $request->amount)->update([
                            "json_result_verify" => json_encode($result),
                        ]);

                        if (floatval($result) > 0 && floatval($result) == floatval($payment->amount)) {

                            $setting = Setting::first();
                            $user = User::where('id', $user_id)->first();

                            if ($user->user_mode == "gold"){
                                $gift = $request->amount + ($request->amount * $setting->percent_gold);
                                Payment::where("user_id", $user_id)->where("invoice_number", $request->InvoiceNumber)->where("amount", $request->amount)->update([
                                    "status" => "SUCCESS",
                                    "credit" => $gift,
                                    "type" => "PERCENT_GIFT_GOLD",
                                ]);

                                User::where("id", $user_id)->increment("credit",$gift);

                                Session::flash("status",
                                    '<div class="alert alert-success text-center mb-2">' . "پرداخت شما به مبلغ " .  number_format($request->amount) . " ریال با موفقیت انجام شد" . '</div>
                                     <div class="alert alert-success text-center mb-2">' . "اعتبار شما به اضافه" . '<span class="text-danger">' . " 15% شارژ هدیه " . '</span>' . "به مبلغ " .  number_format($gift) . " ریال افزایش پیدا کرد" . '</div>'
                                );
                                return redirect()->route("profile_credit");

                            }elseif ($user->user_mode == "normal"){
                                $gift = $request->amount + ($request->amount * $setting->percent_gift);
                                Payment::where("user_id", $user_id)->where("invoice_number", $request->InvoiceNumber)->where("amount", $request->amount)->update([
                                    "status" => "SUCCESS",
                                    "credit" => $gift,
                                ]);

                                User::where("id", $user_id)->increment("credit",$gift);

                                Session::flash("status",
                                    '<div class="alert alert-success text-center mb-2">' . "پرداخت شما به مبلغ " .  number_format($request->amount) . " ریال با موفقیت انجام شد" . '</div>
                                     <div class="alert alert-success text-center mb-2">' . "اعتبار شما به اضافه" . '<span class="text-danger">' . " 10% شارژ هدیه " . '</span>' . "به مبلغ " .  number_format($gift) . " ریال افزایش پیدا کرد" . '</div>'
                                );
                                return redirect()->route("profile_credit");
                            }

                        } else {
                            return redirect()->route("profile_credit")->withErrors("عملیات پرداخت بانکی با موفقیت انجام نشد");
                        }

                    }

                    return redirect()->route("profile_credit")->withErrors("عملیات پرداخت بانکی با موفقیت انجام نشد");

                }

                return redirect()->route("profile_credit")->withErrors("عملیات پرداخت بانکی با موفقیت انجام نشد");

            }

            return redirect()->route("profile_credit")->withErrors("عملیات پرداخت بانکی با موفقیت انجام نشد");

        }

        return redirect()->route("profile_credit")->withErrors("عملیات پرداخت بانکی با موفقیت انجام نشد");

    }

}
