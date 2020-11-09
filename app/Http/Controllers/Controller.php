<?php

namespace App\Http\Controllers;

use App\Jobs\Email;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Morilog\Jalali\Jalalian;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function sms($mobile, $content)
    {

        $content = urlencode($content);
        $username = "989122655077";
        $password = "B@zar1946";
        $originator = "500043970097";
        $url = "https://negar.armaghan.net/sms/url_send.html?originator=$originator&destination=$mobile&content=$content&password=$password&username=$username";
        $ch = curl_init();
        $curlConfig = array(
            CURLOPT_URL => $url,
            CURLOPT_ENCODING => "UTF-8",
            CURLOPT_RETURNTRANSFER => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_CONNECTTIMEOUT => 120,
            CURLOPT_TIMEOUT => 120,
        );
        curl_setopt_array($ch, $curlConfig);
        curl_exec($ch);
        curl_close($ch);

    }

    public static function email($email,$view,$content,$title,$subject)
    {
        $result = [
            "email" => $email,
            "content" => $content,
            'title' => $title,
            'subject' => $subject
        ];

        Mail::send('emails.'.$view, ["result" => $result], function ($message) use ($result,$subject,$title) {
            $message->from('hr.ahmadi@setarehvanak.com', $title);
            $message->to($result['email'])->subject($subject);
        });
    }

    function faToEn($string)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];

        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $string);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

        return $englishNumbersOnly;
    }

    public static function slug($string, $separator = '-')
    {

        if (is_null($string)) {
            return "";
        }
        $string = trim($string);
        $string = mb_strtolower($string, "UTF-8");;
        $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);
        $string = preg_replace("/[\s-]+/", " ", $string);
        $string = preg_replace("/[\s_]/", $separator, $string);

        return $string;

    }

    public static function membershipNumberEncode($id){

        $user = User::where("id",$id)->first();

        if(isset($user->id)){

            $membershipNumber = Jalalian::forge($user['created_at'])->format("y").Jalalian::forge($user['created_at'])->format("m").$id;

            return $membershipNumber;

        }

        return false;

    }

    public static function membershipNumberDecode($code){

        if(isset($code)) {

            $user = User::where("membership_number", $code)->first();

            if(isset($user->id)){

                return $user;

            }

            return false;

        }

        return false;

    }


}
