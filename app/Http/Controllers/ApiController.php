<?php

namespace App\Http\Controllers;

use App\Models\Accounting;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ApiController extends Controller
{

    public function index($name,$token,$query) {

        $tokenExists = Accounting::where("token",$token)->first();
        if(isset($tokenExists->id)){

            // baraye tamdide api test
            if(Carbon::parse($tokenExists->expire_date)->diff(Carbon::now())->d == 0){
                $extension = Carbon::parse($tokenExists->expire_date)->addDays(30);
            }

            if($tokenExists->count > 0){

                $tokenExists->decrement("count");
                $tokenExists->save();

                if($name == "melli-cart"){
                    return MelliCodeController::index($query);
                }

                return response()->json(["status" => false , "result" => null , "description" => "وب سرویس درخواستی یافت نشد"]);
            }
            return response()->json(["status" => false , "result" => null , "description" => "اعتبار شما کافی نیست"]);
        }
        return response()->json(["status" => false , "result" => null , "description" => "توکن وارد شده غیر مجاز می باشد"]);

    }

}
