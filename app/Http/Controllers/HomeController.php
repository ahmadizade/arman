<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {

        $popularShop = Store::inRandomOrder()->orderBy('id' , 'desc')->orderBy('like' , 'desc')->limit(12)->get();
        $randomShop = Store::inRandomOrder()->limit(12)->get();

        $lastProduct = Product::orderBy('id' , 'desc')->limit(12)->get();
        return view('home' , ['popularShop' => $popularShop , 'randomShop' => $randomShop, 'lastProduct' => $lastProduct]);

    }

    public function contact(){

        return view('contact');

    }

    public function contactAction(Request $request){

        $request = $request->replace(self::faToEn($request->all()));

        $request->validate([
            'name' => 'required|min:3|max:100',
            'mobile' => 'required|min:3|max:100',
            'desc' => 'required|min:3|max:10000',
        ]);
        if (Auth::check()){
            $user_id = Auth::id();
        }else{
            $user_id = "";
        }
        Contact::create([
            "user_id" => $user_id,
            "name" => $request->name,
            "mobile" => $request->mobile,
            "body" => $request->desc,
            "created_at" => Carbon::now(),
        ]);

        session()->flash("status","فرم شما با موفقیت ثبت شد. در صورت لزوم کارشناسان ما با شما تماس خواهند گرفت");

        return back();

    }

    public function AboutUs(){
        return view('about');
    }
}
