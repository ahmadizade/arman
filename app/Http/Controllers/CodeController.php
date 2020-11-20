<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CodeController extends Controller
{
//    static public function Code_Generator(Request $request)
//    {
//        $user_data = User::where('id' , $request->user_id)->first();
//        $data = ['msg' => $request->qr_data , 'mobile' => $user_data->mobile , 'name' => $user_data->name];
//        $data = json_encode($data);
//        $data = urlencode($data);
//        return view('partials.qrcode', ['data' => $data]);
//    }
    static public function Code_Generator(Request $request)
    {
        $user_data = User::where('id', $request->user_id)->first();
        $data = ['id' => $request->user_id, 'msg' => $request->qr_data, 'mobile' => $user_data->mobile];
        $data = json_encode($data);
        $data = urlencode($data);
// create curl resource
        $url = "https://api.qrserver.com/v1/create-qr-code/?data=salam";
        $ch = curl_init();
        header('Content-type: image/jpeg');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, 0);

//        curl_setopt($ch, CURLOPT_HTTP_CONTENT_DECODING, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
//        curl_setopt($ch, CURLOPT_VERBOSE, false);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.1 Safari/537.11');

// set url
        curl_setopt($ch, CURLOPT_URL, "https://api.qrserver.com/v1/create-qr-code/?data=salam");

//return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//SSL
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        header('Content-type: image/jpeg/png');

        header('Content-Type: ' . curl_getinfo($ch, CURLINFO_CONTENT_TYPE));
        if (!curl_errno($ch)) {
            curl_close($ch);
            $img = imagecreatefromstring($response);
            imagejpeg($img);
            imagedestroy($img);
            return true;
        } else {
            curl_close($ch);
            return curl_error($ch);
        }
    }
}
