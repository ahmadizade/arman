<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Report;
use App\Models\Store;
use App\OnlineOrderForm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ShopController extends Controller
{

    public function Search(Request $request)
    {
        if ($request->has('q') && Str::length($request->q) > 1) {
            $search = $request->q;
            $data = DB::table('products')
                ->where('product_name', 'LIKE', "%$search%")
                ->leftJoin('category', 'category.id', '=', 'products.category_id')
                ->leftJoin('store', 'store.user_id', '=', 'products.user_id')
                ->get(['products.*', 'store.shop as shop', 'store.shop_slug as slug', 'store.branch_slug as branch', 'category.name as category']);
            if(!$data->isEmpty()){
                return response()->json([
                'data' => $data,
                'beta' => "1"
                ]);
            }else{
                $data = DB::table('store')
                    ->where('shop','LIKE', "%$search%")
                    ->leftJoin('category', 'category.id','=','store.category')
                    ->get(['store.*', 'category.name as category']);
                return response()->json([
                    'data' => $data,
                    'beta' => "2"
                ]);
            }
        }
    }

    public function singleShop($shop, $branch = null)
    {

        if (isset($shop)) {

            if ($branch == null) {
                $store = Store::where("shop_slug", $shop)->first();
            } else {
                $store = Store::where("shop_slug", $shop)->where("branch_slug", $branch)->first();
            }

            if (isset($store->id)) {

                $products = Product::where("user_id", $store->user_id)->where('status', 1)->get();

                $comments = Comment::where("store_id", $store->id)->orderBy("id", "desc")->get();

                $likeCount = Like::where("store_id", $store->id)->count();

                $suggest = Store::inRandomOrder()->limit(3)->get();

                /* $user = Profile::where("user_id",$store->user_id)->first();*/

                self::makeQrcode($store->user_id);
                $membershipNumber = self::membershipNumberEncode($store->user_id);

                return view("shop.store", ["result" => $store, "products" => $products, "comments" => $comments, "likeCount" => $likeCount, "suggest" => $suggest,"membershipNumber" => $membershipNumber]);

            }

            return abort(400);

        }

        return abort(400);

    }

    public function CommentAction(Request $request)
    {
        $request = $request->replace(self::faToEn($request->all()));

        $validate = Validator::make($request->all(), [
            'name' => 'required|min:3|max:100',
            'email' => 'nullable|min:3|max:100',
            'desc' => 'required|min:3|max:10000',
        ]);

        if ($validate->fails()) {
            session::flash("error",$validate->errors()->first());
            return back();
        }
        if (Auth::check() && Auth::id() > 0) {
            Comment::create([
                "store_id" => $request->store,
                "name" => $request->name,
                "email" => $request->email,
                "desc" => $request->desc,
                "status" => 0,
                "product_id" => $request->product_id,
                "user_id" => Auth::id() ?? '',
                "created_at" => Carbon::now(),
            ]);
        }else {
            Comment::create([
                "name" => $request->name,
                "email" => $request->email,
                "desc" => $request->desc,
                "status" => 0,
                "product_id" => $request->product_id,
                "created_at" => Carbon::now(),
            ]);
        }
        session::flash("status", 'پیام شما با موفقیت ارسال شد و پس از تایید همکاران نمایش داده خواهد شد');
        return back();
    }

    public function Bookmark(Request $request)
    {
        if (isset($request->product_id) && Auth::check()) {

            $checkBookmark = Bookmark::where("product_id", $request->product_id)->first();

            if (!isset($checkBookmark->id)) {
                Bookmark::create([
//                    "store_id" => $request->store,
                    "product_id" => $request->product_id,
                    "user_id" => Auth::id(),
                    "created_at" => Carbon::now()
                ]);
            } else {
                return Response::json(["status" => "0", "desc" => "قبلا به لیست علاقه مندی های شما اضافه شده است"]);
            }

            return Response::json(["status" => "1", "desc" => "به لیست علاقه مندی های شما اضافه شد"]);

        }

        return Response::json(["status" => "0", "desc" => "ابتدا باید در سایت عضو شوید"]);

    }

    public function Like(Request $request)
    {

        if (isset($request->product_id) && Auth::check()) {

            $checkBookmark = Like::where("product_id", $request->product_id)->first();

            if (!isset($checkBookmark->id)) {
                Like::create([
                    "product_id" => $request->product_id,
                    "user_id" => Auth::id(),
                    "created_at" => Carbon::now()
                ]);
            } else {
                return Response::json(["status" => "0", "desc" => "شما قبلا این محصول را پسند کرده اید"]);
            }

            return Response::json(["status" => "1", "desc" => "با تشکر از نظر مثبت شما به این محصول"]);

        }

        return Response::json(["status" => "0", "desc" => "ابتدا باید در سایت عضو شوید"]);


    }

    public function Report(Request $request)
    {

        if (Auth::check()) {

            if (isset($request->store) && isset($request->report)) {

                $checkReport = Report::where("store_id", $request->store)->where("user_id", Auth::id())->first();

                if (!isset($checkReport->id)) {
                    Report::create([
                        "user_id" => Auth::id(),
                        "store_id" => $request->store,
                        "report_id" => $request->report,
                        "desc" => $request->desc,
                        "created_at" => Carbon::now(),
                    ]);
                } else {
                    return Response::json(["status" => "2", "desc" => "شما قبلا این فروشگاه را گزارش کرده اید"]);
                }

                return Response::json(["status" => "1", "desc" => "با تشکر. گزارش شما ثبت شد"]);

            }

            return Response::json(["status" => "0", "desc" => "لطفا یکی از موارد را انتخاب کنید"]);

        }

        return Response::json(["status" => "0", "desc" => "برای ارسال گزارش تخلف , ابتدا باید در سایت عضو شوید"]);

    }

}
