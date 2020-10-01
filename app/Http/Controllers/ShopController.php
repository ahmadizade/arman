<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function ProductSingle($id)
    {

        if(isset($id)){

            $result = Product::where("id",$id)->first();

            return view("shop.single",["result" => $result]);

        }

    }

}
