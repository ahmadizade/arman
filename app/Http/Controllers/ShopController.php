<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Comment;
use App\Models\Like;
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

                $likeCount = Like::where("store_id",$store->id)->count();

                return view("shop.store",["result" => $store , "products" => $products , "comments" => $comments , "likeCount" => $likeCount]);

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

    public function Bookmark(Request $request){

        if(isset($request->store) && Auth::check()){

            $checkBookmark = Bookmark::where("store_id",$request->store)->where("user_id",Auth::id())->first();

            if(!isset($checkBookmark->id)){
                Bookmark::create([
                    "store_id" => $request->store,
                    "user_id" => Auth::id(),
                    "created_at" => Carbon::now()
                ]);
            }else{
                return Response::json(["status" => "1","desc" => "این فروشگاه قبلا به لیست علاقه مندی های شما اضافه شده است. لطفا به پروفایل کاربری مراجعه فرمایید"]);
            }

            return Response::json(["status" => "1","desc" => "این فروشگاه به لیست علاقه مندی های شما اضافه شد"]);

        }

        return Response::json(["status" => "0","desc" => "برای اضافه کردن علاقه مندی ها , ابتدا باید در سایت عضو شوید"]);

    }

    public function Like(Request $request){

        if(isset($request->store) && Auth::check()){

            $checkBookmark = Like::where("store_id",$request->store)->where("user_id",Auth::id())->first();

            if(!isset($checkBookmark->id)){
                Like::create([
                    "store_id" => $request->store,
                    "user_id" => Auth::id(),
                    "created_at" => Carbon::now()
                ]);
            }else{
                return Response::json(["status" => "2","desc" => "شما قبلا این فروشگاه را پسندیده اید"]);
            }

            return Response::json(["status" => "1","desc" => "با تشکر از نظر مثبت شما به این فروشگاه"]);

        }

        return Response::json(["status" => "0","desc" => "برای پسندیدن این فروشگاه , ابتدا باید در سایت عضو شوید"]);


    }

}
