<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {

        $lastProducts = Product::orderBy('id' , 'desc')->orderBy('created_at' , 'desc')->limit(12)->get();
        $popular = Product::inRandomOrder()->orderBy('id' , 'desc')->orderBy('view' , 'desc')->limit(12)->get();
        $randomProduct = Product::inRandomOrder()->limit(12)->get();

        return view('home' , ['lastProducts' => $lastProducts , 'popular' => $popular, 'randomProduct' => $randomProduct]);

    }

    public function contact(){

        return view('contact');

    }

    public function singleShop($title,$branch){

        if(isset($title) && isset($branch)){

            $store = Store::where("title_slug",$title)->where("branch_slug",$branch)->first();

            if(isset($store->id)){

                return $store;

            }

            return abort(400);

        }

        return abort(400);

    }

}
