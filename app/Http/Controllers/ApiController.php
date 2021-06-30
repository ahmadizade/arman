<?php

namespace App\Http\Controllers;

use App\Models\Accounting;
use App\Models\Blog;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ApiController extends Controller
{

    public function index($name,$token,$query) {

        $tokenExists = Accounting::where("token",$token)->first();

        if(isset($tokenExists->id)){

            if($tokenExists->payment_type == "paid") {
                if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']){
                    $referer = $_SERVER['HTTP_REFERER'];
                    return dd($referer);
                }
            }

            // baraye tamdide api test
            if($tokenExists->payment_type == "free") {
                if (Carbon::today()->floatDiffInDays(Carbon::parse($tokenExists->expire_date), false) < 0) {
                    $product = Product::where("id",$tokenExists->api_id)->first();
                    $tokenExists->expire_date = Carbon::parse(Carbon::now())->addDays(30);
                    $tokenExists->count = $product->free_request ?? 100;
                    $tokenExists->save();
                }
            }

            if($tokenExists->count > 0){

                $tokenExists->decrement("count");
                $tokenExists->save();

                if($name == "melli-cart"){
                    return MelliCodeController::index($query);
                }

                return response()->json(["status" => 200 , "result" => null , "description" => "وب سرویس درخواستی یافت نشد"]);
            }

            return response()->json(["status" => 200 , "result" => null , "description" => "اعتبار شما کافی نیست"]);
        }

        return response()->json(["status" => 200 , "result" => null , "description" => "توکن وارد شده غیر مجاز می باشد"]);

    }

}
