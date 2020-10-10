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
        $data = ['id' => $request->user_id,'msg' => $request->qr_data, 'mobile' => $user_data->mobile];
        $data = json_encode($data);
        $data = urlencode($data);
// create curl resource
        $url = "https://api.qrserver.com/v1/create-qr-code/?data=salam";
        $ch = curl_init ();
        header('Content-type: image/jpeg');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTP_CONTENT_DECODING, false);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER,true);
//        curl_setopt($ch, CURLOPT_VERBOSE, false);

// set url
        curl_setopt($ch, CURLOPT_URL, "https://api.qrserver.com/v1/create-qr-code/?data=salam");

//return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//SSL
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// $output contains the output string

        $output = curl_exec($ch);
        if (curl_exec($ch) === FALSE) {
            die("Curl Failed: " . curl_error($ch));
        } else {
            return curl_exec($ch);
        }
// close curl resource to free up system resources
        curl_close($ch);

    }
}
