<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\AbjadController;
use App\Http\Controllers\Api\MelliCodeController;
use App\Http\Controllers\Api\BmiController;
use App\Http\Controllers\Controller;
use App\Models\Accounting;
use App\Models\Blog;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ApiController extends Controller
{

    public function index(Request $request,$name,$token,$query) {

        $tokenExists = Accounting::where("token",$token)->first();

        if(isset($tokenExists->id)){

            if($tokenExists->payment_type == "paid") {
                if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']){
                    $referer = $_SERVER['HTTP_REFERER'];
                    return dd($referer);
                }
            }

            // baraye tamdide api test
            if($tokenExists->payment_type == "FREE") {
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

                if($name == "melli-cart" && $tokenExists->api_id == 140){
                    return MelliCodeController::index($query);
                }

                if($name == "abjad" && $tokenExists->api_id == 141){
                    return AbjadController::index($query);
                }

                if($name == "bmi" && $tokenExists->api_id == 142){
                    return BmiController::index($request,$query);
                }

                return response()->json(["status" => 200 , "result" => null , "description" => "وب سرویس درخواستی یافت نشد"]);
            }

            return response()->json(["status" => 200 , "result" => null , "description" => "اعتبار شما کافی نیست"]);
        }

        return response()->json(["status" => 200 , "result" => null , "description" => "توکن وارد شده غیر مجاز می باشد"]);

    }

}
