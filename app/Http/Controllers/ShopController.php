<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function singleShop($title,$branch = null){

        if(isset($title)){

            if($branch == null){
                $store = Store::where("title_slug",$title)->first();
            }else{
                $store = Store::where("title_slug",$title)->where("branch_slug",$branch)->first();
            }

            if(isset($store->id)){

                return view("store",["result" => $store]);

            }

            return abort(400);

        }

        return abort(400);

    }

}
