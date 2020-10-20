<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

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

                $comments = Comment::where("store_id",$store->id)->orderBy("id","desc")->get();

                return view("shop.store",["result" => $store , "products" => $products , "comments" => $comments]);

            }

            return abort(400);

        }

        return abort(400);

    }

    public function CommentAction(Request $request){

        $request = $request->replace(self::faToEn($request->all()));

        $validate = Validator::make($request->all(), [
            'name' => 'required|min:3|max:100',
            'email' => 'nullable|min:3|max:100',
            'desc' => 'required|min:3|max:10000',
        ]);

        if ($validate->fails()) {
            return Response::json(["status" => "0","desc" => "فیلد نام و توضیحات الزامیست"]);
        }

        Comment::create([
            "store_id" => $request->store,
            "name" => $request->name,
            "email" => $request->email,
            "desc" => $request->desc,
            "status" => 1,
            "user_id" => Auth::id() ?? '',
            "created_at" => Carbon::now(),
        ]);

        return Response::json(["status" => "1","desc" => "پیام شما با موفقیت ارسال شد"]);

    }

}
