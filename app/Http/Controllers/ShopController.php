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

                $products = Product::where("user_id",$store->user_id)->where('status', 1)->get();

                return view("store",["result" => $store , "products" => $products]);

            }

            return abort(400);

        }

        return abort(400);

    }

}
