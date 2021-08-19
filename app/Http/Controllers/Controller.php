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
use Illuminate\Support\Facades\Storage;
use Morilog\Jalali\Jalalian;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const MerchantId = 'K146';
    const admin_email = 'info@CioCe.ir';
    const sha1Key = '22338240992352910814917221751200141041845518824222260';

    public static function email($email,$view,$content,$title,$subject)
    {
        $result = [
            "email" => $email,
            "content" => $content,
            'title' => $title,
            'subject' => $subject
        ];

        Mail::send('emails.'.$view, ["result" => $result], function ($message) use ($result,$subject,$title) {
            $message->from('support@cioce.ir', $title);
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

    public static function makeQrcode($user_id){

        if(!Storage::disk('qrcode')->has(self::membershipNumberEncode($user_id).'.svg')){
            $image =  QrCode::size(500)->generate($user_id);
            Storage::disk('qrcode')->put(self::membershipNumberEncode($user_id).'.svg',$image);
        }

    }

}
