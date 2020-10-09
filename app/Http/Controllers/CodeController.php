<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CodeController extends Controller
{
    static public function Code_Generator(Request $request)
    {
        $user_data = User::where('id' , $request->user_id)->first();
        $data = ['msg' => $request->qr_data , 'mobile' => $user_data->mobile , 'name' => $user_data->name];
        $data = json_encode($data);
        $data = urlencode($data);
        return view('partials.qrcode', ['data' => $data]);
    }
}
