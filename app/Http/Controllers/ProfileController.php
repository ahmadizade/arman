<?php

namespace App\Http\Controllers;

use App\Jobs\Sms;
use App\Models\Accounting;
use App\Models\Bookmark;
use App\Models\CartTransfer;
use App\Models\Category;
use App\Models\Category_variety;
use App\Models\Comment;
use App\Models\Download;
use App\Models\Like;
use App\Models\OrderProducts;
use App\Models\Orders;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Product_tag;
use App\Models\Profile;
use App\Models\Setting;
use App\Models\Statement;
use App\Models\Store;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Morilog\Jalali\Jalalian;
use Psy\Util\Json;
use SoapClient;
use RealRashid\SweetAlert\Toaster;
use RealRashid\SweetAlert\Facades\Alert;
use function PHPUnit\Framework\isEmpty;

class ProfileController extends Controller
{

    public function Index()
    {
        if (Auth::check()) {
            $store = Store::where('user_id', Auth::id())->first();
            $bookmark = Bookmark::where('user_id', Auth::id())->get();
            $orders = Orders::where('user_id', Auth::id())->limit(3)->get();
            if (isEmpty($store) && $store == "") {
                return view("profile.index", ["user" => Auth::user(), "menu" => "index", "bookmark" => $bookmark, "orders" => $orders]);
            } else {
                $like = Like::where('store_id', $store->id)->count();
                return view("profile.index", ["user" => Auth::user(), "like" => $like, "store" => $store, "menu" => "index", "bookmark" => $bookmark, "orders" => $orders]);
            }
        } else {
            return redirect()->to(route('home'));
        }
    }

    public function Store(Request $request)
    {
        $result = Store::where("user_id", Auth::id())->first();
        $category = Category::all();
        $category_variety = Category_variety::all();
        return view("profile.store", ["result" => $result, "category" => $category, "menu" => "store", "category_variety" => $category_variety]);
    }

    public function StoreEditAction(Request $request)
    {
        $request = $request->replace(self::faToEn($request->all()));
        if ($request->nature == 1) {
            $request->validate([
                'shop' => 'required|min:3|max:128',
                'name' => 'required|min:2|max:60',
                'discount' => 'required|min:0|max:100',
                'category' => 'required|min:1',
                'category_variety' => 'required|min:1',
                'telephone' => 'nullable|digits:8',
                'melli_code' => 'required|digits:10',
                'address' => 'required',
            ]);
            Store::where('id', $request->id)->update([
                'user_id' => Auth::id(),
                'shop' => $request->shop,
                'name' => $request->name,
                'discount' => $request->discount,
                'category' => $request->category,
                'category_variety' => $request->category_variety,
                'telephone' => $request->telephone,
                'melli_code' => $request->melli_code,
                'address' => $request->address,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'shop_slug' => self::slug($request->shop),
            ]);
            session()->flash("status", "اطلاعات با موفقیت ثبت شد");
            return back();
        } elseif ($request->nature == 2) {
            $request->validate([
                'legal_shop' => 'required|min:3|max:128',
                'legal_name' => 'required|min:2|max:60',
                'legal_discount' => 'required|min:0|max:100',
                'legal_mobile' => 'required|digits:11',
                'legal_telephone' => 'required|digits:8',
                'legal_branch' => 'nullable|min:3|max:100',
                'legal_category' => 'required|min:1',
                'legal_category_variety' => 'required|min:1',
                'legal_kind_of' => 'required|min:1',
                'shenase_melli' => 'nullable|min:3|max:32',
                'registration_number' => 'nullable|min:3|max:32',
                'legal_melli_code' => 'required|digits:10',
                'legal_address' => 'required',
            ]);
            Store::where('id', $request->id)->update([
                'user_id' => Auth::id(),
                'shop' => $request->legal_shop,
                'name' => $request->legal_name,
                'discount' => $request->legal_discount,
                'ceo_mobile' => $request->legal_mobile,
                'telephone' => $request->legal_telephone,
                'branch' => $request->legal_branch,
                'category' => $request->legal_category,
                'category_variety' => $request->legal_category_variety,
                'kind_of' => $request->legal_kind_of,
                'shenase_melli' => $request->shenase_melli,
                'melli_code' => $request->legal_melli_code,
                'registration' => $request->registration_number,
                'address' => $request->legal_address,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'shop_slug' => self::slug($request->legal_shop),
                'branch_slug' => self::slug($request->legal_branch),
            ]);
            session()->flash("status", "اطلاعات با موفقیت ویرایش شد");
            return back();
        }
    }

    public function StoreAction(Request $request)
    {
        $request = $request->replace(self::faToEn($request->all()));
        if ($request->nature == 0) {
            session()->flash("error", "لطفا  فیلد ماهیت و فیلدهای مرتبط را تکمیل نمایید");
            return back();
        } elseif ($request->nature == 1) {
            $request->validate([
                'shop' => 'required|min:3|max:128|unique:store',
                'name' => 'required|min:2|max:60',
                'discount' => 'required|min:0|max:100',
                'branch' => 'nullable|min:3|max:100',
                'nature' => 'required|min:1',
                'category' => 'required|min:1',
                'category_variety' => 'required|min:1',
                'shenase_melli' => 'nullable|min:3|max:32',
                'telephone' => 'nullable|digits:8',
                'melli_code' => 'required|digits:10',
                'address' => 'required',
                'file' => 'image|nullable|dimensions:min_width=300,min_height=300|max:2048',
            ]);
            $imageName = null;
            if (isset($request->file) && strlen($request->file) > 0) {

                $exists = Storage::disk('logo')->exists($request->file('file')->getClientOriginalName());

                if ($exists == true) {
                    $imageName = time();
                    $imageName = $imageName . "-" . $request->file('file')->getClientOriginalName();
                    $img = Image::make('images/shop/logo/' . pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_BASENAME));
                    $img->resize(300, 300, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $img->save('images/shop/logo/' . $imageName);

                } else {
                    $imageName = $request->file('file')->getClientOriginalName();
                    $img = Image::make($request->file('file'))->resize(300, 300, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $img->save('images/shop/logo/' . $imageName);
                }
            }
            Store::create([
                'user_id' => Auth::id(),
                'shop' => $request->shop,
                'branch' => $request->branch,
                'nature' => $request->nature,
                'category' => $request->category,
                'category_variety' => $request->category_variety,
                'shenase_melli' => $request->shenase_melli,
                'telephone' => $request->telephone,
                'name' => $request->name,
                'discount' => $request->discount,
                'melli_code' => $request->melli_code,
                'address' => $request->address,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'logo' => $imageName,
                'color' => $request->color,
                'shop_slug' => self::slug($request->shop),
                'branch_slug' => self::slug($request->branch),
            ]);
            if (isset($request->color)) {
                Store::where("user_id", Auth::id())->update([
                    "color" => $request->color
                ]);
            }
            session()->flash("status", "اطلاعات با موفقیت ثبت شد");
            return back();
        } elseif ($request->nature == 2) {
            $request->validate([
                'legal_shop' => 'required|min:3|max:128',
                'legal_name' => 'required|min:2|max:60',
                'legal_discount' => 'required|min:0|max:100',
                'legal_mobile' => 'required|digits:11',
                'legal_telephone' => 'required|digits:8',
                'legal_branch' => 'nullable|min:3|max:100',
                'nature' => 'required|min:1',
                'legal_category' => 'required|min:1',
                'legal_category_variety' => 'required|min:1',
                'legal_kind_of' => 'required|min:1',
                'shenase_melli' => 'nullable|min:3|max:32',
                'registration_number' => 'nullable|min:3|max:32',
                'legal_melli_code' => 'required|digits:10',
                'legal_address' => 'required',
                'file' => 'image|nullable|dimensions:min_width=300,min_height=300|max:2048',
            ]);
            $imageName = null;
            if (isset($request->file) && strlen($request->file) > 0) {
                $exists = Storage::disk('logo')->exists($request->file('file')->getClientOriginalName());
                if ($exists == true) {
                    $imageName = time();
                    $imageName = $imageName . "-" . $request->file('file')->getClientOriginalName();
                    $img = Image::make('images/shop/logo/' . pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_BASENAME));
                    $img->resize(300, 300, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $img->save('images/shop/logo/' . $imageName);
                } else {
                    $imageName = $request->file('file')->getClientOriginalName();
                    $img = Image::make($request->file('file'))->resize(300, 300, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $img->save('images/shop/logo/' . $imageName);
                }
            }
            $check_shop = Store::where('shop', $request->legal_shop)->exists();
            if ($check_shop == false) {
                Store::create([
                    'user_id' => Auth::id(),
                    'shop' => $request->legal_shop,
                    'name' => $request->legal_name,
                    'discount' => $request->legal_discount,
                    'ceo_mobile' => $request->legal_mobile,
                    'telephone' => $request->legal_telephone,
                    'branch' => $request->legal_branch,
                    'nature' => $request->nature,
                    'category' => $request->legal_category,
                    'category_variety' => $request->legal_category_variety,
                    'kind_of' => $request->legal_kind_of,
                    'shenase_melli' => $request->shenase_melli,
                    'melli_code' => $request->legal_melli_code,
                    'registration' => $request->registration_number,
                    'address' => $request->legal_address,
                    'created_at' => Carbon::now(),
                    'logo' => $imageName,
                    'color' => $request->color,
                    'shop_slug' => self::slug($request->legal_shop),
                    'branch_slug' => self::slug($request->legal_branch),
                ]);
                if (isset($request->color)) {
                    Store::where("user_id", Auth::id())->update([
                        "color" => $request->color
                    ]);
                }
                session()->flash("status", "اطلاعات با موفقیت ثبت شد");
                return back();
            } else {
                session()->flash("error", "فروشگاه تکراریست");
                return back();
            }

        }
    }

    public function StoreDescAction(Request $request)
    {

        $request = $request->replace(self::faToEn($request->all()));

        $request->validate([
            'desc' => 'nullable|min:10|max:100000',
            'file' => 'image|nullable|dimensions:min_width=300,min_height=300|max:2048',
        ]);

        if (isset($request->file) && strlen($request->file) > 0) {

            $imageName = null;

            $exists = Storage::disk('logo')->exists($request->file('file')->getClientOriginalName());

            if ($exists == true) {

                $imageName = time();
                $imageName = $imageName . "." . $request->file('file')->getClientOriginalExtension();

                $img = Image::make('images/shop/logo/' . pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_BASENAME));
                $img->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img->save('images/shop/logo/' . $imageName);

            } else {

                $imageName = $request->file('file')->getClientOriginalName();
                $img = Image::make($request->file('file'))->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });

                $img->save('images/shop/logo/' . $imageName);

            }

            Store::where("user_id", Auth::id())->update([
                "logo" => $imageName
            ]);

        }

        Store::where("user_id", Auth::id())->update([
            "desc" => $request->desc,
        ]);

        if (isset($request->color)) {
            Store::where("user_id", Auth::id())->update([
                "color" => $request->color
            ]);
        }

        session()->flash("status", "توضیحات با موفقیت ثبت شد");

        return back();

    }

    public function StoreCategoryAction(Request $request)
    {
        $id = $request->id;
        if (is_numeric($id) && $id > 0) {
            $variety = Category_variety::where('category_id', $id)->get();
            return response()->json($variety);
        } else {
            return response()->json('error', "0");
        }
    }

    public function Products()
    {
        $product = Product::orderBy('id', 'desc')->where('user_id', Auth::id())->where('status', 1)->paginate(20);
        $count = Product::where('user_id', Auth::id())->where('status', 1)->count();
        return view('profile.products', ["product" => $product, "count" => $count, "menu" => "products"]);
    }

    public function SingleProduct(Request $request)
    {
        $product = Product::where('product_slug', $request->slug)->first();
        $comments = Comment::where('product_id', $product->id)->where('comment_for', 'single_product')->get();
        Product::where('product_slug', $request->slug)->increment('view', 1);
        $popularproduct = Product::orderBy('view', 'desc')->limit(10)->get();
        return view('product.single_product', ["product" => $product, "comments" => $comments, 'popularproduct' => $popularproduct]);
    }

    public function subscribe($id)
    {
        $product = Product::where('id', $id)->where('type', "api")->first();
        $apiMostVisited = Product::where('type', 'api')->orderBy('view', 'desc')->limit(10)->get();
        return view('product.subscribe', ['product' => $product, 'apiMostVisited' => $apiMostVisited]);
    }

    public function selectPackage(Request $request)
    {
        $product = Product::where('type', "api")->where('id', $request->id)->first();
        if ($request->package == "basic") {
            $price = $product->price;
            $request_quantity_1_month = $product->free_request;
            $request_quantity_3_month = 0;
            $three_month_price = 0;

        } elseif ($request->package == "pro") {
            $price = $product->pro_price;
            $request_quantity_1_month = $product->pro_request_1_month;
            $request_quantity_3_month = $product->pro_request_3_month;
            $three_month_price = $product->pro_price * 3;

        } elseif ($request->package == "ultra") {
            $price = $product->ultra_price;
            $request_quantity_1_month = $product->ultra_request_1_month;
            $request_quantity_3_month = $product->ultra_request_3_month;
            $three_month_price = $product->ultra_price * 3;

        } elseif ($request->package == "mega") {
            $price = $product->mega_price;
            $request_quantity_1_month = $product->mega_request_1_month;
            $request_quantity_3_month = $product->mega_request_3_month;
            $three_month_price = $product->mega_price * 3;
        }
        return view('product.choice', ['product' => $product, 'package' => $request->package, 'price' => $price, 'request_quantity_1_month' => $request_quantity_1_month, 'request_quantity_3_month' => $request_quantity_3_month, 'three_month_price' => $three_month_price,]);
    }

    public function choice(Request $request, $id, $type)
    {

        $checkProduct = Product::where("id", $id)->first();

        if (isset($id) && isset($type) && isset($request->month) && isset($checkProduct->id)) {

            if ($type == "basic" || $type == "pro" || $type == "ultra" || $type == "mega") {

                $checkAcc = Accounting::where("api_id", $id)->where("user_id", Auth::id())->first();

                if ($request->month == "0") {

                    if (isset($checkAcc)) {

                        Session::flash('error', 'شما قبلا از این وب سرویس استفاده کرده‌اید . برای خرید به صفحه وب سرویس‌های من مراجعه فرمایید');
                        return back();

                    } else {

                        $order_id = Orders::create([
                            "user_id" => Auth::id(),
                            "product_id" => $id,
                            "last_price" => 0,
                            "last_discount" => 0,
                            "status" => 2,
                            "created_at" => Carbon::now(),
                            "order_number" => 'CIO' . "-" . rand(10000000, 99999999),
                        ])->id;

                        OrderProducts::create([
                            "user_id" => Auth::id(),
                            "order_id" => $order_id,
                            "product_id" => $id,
                            "product_name" => $checkProduct->product_name,
                            "product_quantity" => 1,
                            "product_price" => "0",
                            "discount" => "0",
                            "type" => "api",
                            "created_at" => Carbon::now(),
                        ]);

                        Accounting::create([
                            "user_id" => Auth::id(),
                            "api_id" => $id,
                            "token" => Str::random(32),
                            "domain" => "",
                            "meli_code" => "",
                            "payment_type" => "FREE",
                            "month" => 0,
                            "paid_type" => "",
                            "count" => $checkProduct->free_request,
                            "start_date" => Carbon::now(),
                            "expire_date" => Carbon::now()->addDays(30),
                            "bank_token" => "",
                        ]);

                        return Redirect::route("my_webservice");

                    }

                }

                if ($request->month == "1" || $request->month == "3") {

                    if ($type == "pro") {
                        $amount = $checkProduct->pro_price;
                    }
                    if ($type == "ultra") {
                        $amount = $checkProduct->ultra_price;
                    }
                    if ($type == "mega") {
                        $amount = $checkProduct->mega_price;
                    }
                    if ($request->month == "3") {
                        $amount = $amount * 3;
                    }
                    //Discount
                    if ($checkProduct->discount > 0) {
                        $amountWithDiscount = $amount - (($amount * $checkProduct->discount) / 100);
                    } else {
                        $amountWithDiscount = $amount;
                    }
                    //Taxation
                    $amountWithTaxation = $amountWithDiscount + (($amountWithDiscount * 9) / 100);

                    if (isset($checkAcc)) {

                        $order_id = Orders::create([
                            "user_id" => Auth::id(),
                            "product_id" => $id,
                            "last_price" => $amountWithDiscount,
                            "price_with_taxation" => $amountWithTaxation,
                            "last_discount" => $checkProduct->discount,
                            "status" => 0,
                            "created_at" => Carbon::now(),
                            "order_number" => 'CIO' . "-" . rand(10000000, 99999999),
                        ])->id;

                        OrderProducts::create([
                            "user_id" => Auth::id(),
                            "order_id" => $order_id,
                            "product_id" => $id,
                            "product_name" => $checkProduct->product_name,
                            "product_quantity" => 1,
                            "product_price" => $amount,
                            "discount" => $checkProduct->discount,
                            "type" => "api",
                            "created_at" => Carbon::now(),
                        ]);

                        Accounting::where("api_id", $id)->where("user_id", Auth::id())->update([
                            "paid_type" => $type,
                            "month" => $request->month,
                        ]);
                        $id = $checkAcc->id;

                    } else {

                        $order_id = Orders::create([
                            "user_id" => Auth::id(),
                            "product_id" => $id,
                            "last_price" => $amountWithDiscount,
                            "price_with_taxation" => $amountWithTaxation,
                            "last_discount" => $checkProduct->discount,
                            "status" => 0,
                            "created_at" => Carbon::now(),
                            "order_number" => 'CIO' . "-" . rand(10000000, 99999999),
                        ])->id;

                        OrderProducts::create([
                            "user_id" => Auth::id(),
                            "order_id" => $order_id,
                            "product_id" => $id,
                            "product_name" => $checkProduct->product_name,
                            "product_quantity" => 1,
                            "product_price" => $amount,
                            "discount" => $checkProduct->discount,
                            "type" => "api",
                            "created_at" => Carbon::now(),
                        ]);

                        $id = Accounting::create([
                            "user_id" => Auth::id(),
                            "api_id" => $id,
                            "token" => Str::random(32),
                            "domain" => "",
                            "meli_code" => "",
                            "payment_type" => "FREE",
                            "month" => $request->month,
                            "paid_type" => $type,
                            "count" => $checkProduct->free_request,
                            "start_date" => Carbon::now(),
                            "expire_date" => Carbon::now()->addDays(30),
                        ])->id;

                    }

                    return PaymentController::payment($id, $amountWithTaxation);

                }

            }
        }

        return back();

    }


    public function addDomain(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => "required",
            'domain' => ['required', 'string'],
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->errors()->first());
            return back();
        }

        User::where('id', $request->user_id)->update([
            'domain' => $request->domain,
            'updated_at' => Carbon::now(),
        ]);
        Session::flash('status', "دامنه با موفقیت ثبت شد");
        return back();
    }

    public function Cart(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        if (Session::has('product') && count(Session::get('product')) > 0) {
            foreach (Session::get('product') as $item) {
                if ($item['id'] == $product->id) {
                    Session::flash('errors', "این محصول را قبلا انتخاب کرده اید!");
                    return back();
                } else {
                    Session::push('product', $product);
                    Session::flash('status', "کالای شما با موفقیت به سبد خرید افزوده شد");
                    return back();
                }
            }
        } else {
            Session::put('product', [$product]);
            Session::flash('status', "کالای شما با موفقیت به سبد خرید افزوده شد");
            return back();
        }
        Session::flash('status', "متاسفانه مشکلی پیش آمده است!");
        return back();
    }

    public function quickAddCart(Request $request)
    {
        $product = Product::where('id', $request->product_id)->first();
        if (Session::has('product') && count(Session::get('product')) > 0) {
            foreach (Session::get('product') as $item) {
                if ($item->id == $product->id) {
                    return Response::json(["status" => "0", 'desc' => "این محصول را قبلا انتخاب کرده اید!"]);
                } else {
                    $product->total_price = $request->price;
                    $product->order_quantity = $request->quantity;
                    Session::push('product', $product);
                    return Response::json(["status" => "1", 'desc' => "کالای شما با موفقیت به سبد خرید افزوده شد"]);
                }
            }
        } else {

            $product->total_price = $request->price;
            $product->order_quantity = $request->quantity;
            Session::put('product', [$product]);
            return Response::json(["status" => "1", 'desc' => "کالای شما با موفقیت به سبد خرید افزوده شد"]);
        }
        Session::flash('status', "متاسفانه مشکلی پیش آمده است!");
        return back();
    }

    public function CartPage()
    {
        if (Session::has('product') && count(Session::get('product')) > 0) {
            $total_price = 0;
            $price_with_taxation = 0;

            foreach (Session::get('product') as $item) {

                $quantity = $item['order_quantity'] ?? 1;
                if ($item['discount'] > 0) {
                    $total_price += ($item['price'] - (($item['price'] * $item['discount']) / 100)) * $quantity;
                } else {
                    $total_price += $item['price'] * $quantity;
                }

            }

            $taxation = (($total_price * 9) / 100);

            $price_with_taxation = ($total_price + $taxation);


            return view('profile.cart_product', ["total_price" => $total_price, "taxation" => $taxation, "price_with_taxation" => $price_with_taxation]);
        } else {
            Session::flash('error', "سبد خرید شما خالی می باشد");
            return view('profile.cart_product');
        }
    }


    public function shippingPage()
    {
        return view('profile.shipping');
    }

    public function shippingAction(Request $request)
    {
        if (Session::has('product') && count(Session::get('product')) > 0 && Session::has('shipping') && count(Session::get('shipping')) > 0) {
            $total_price = Session::get('shipping')['total_price'];
            $taxation = Session::get('shipping')['taxation'];
            $price_with_taxation = Session::get('shipping')['price_with_taxation'];
            $order_number = 'A.M-' . mt_rand(1, 90000) .'-'. Auth::id();
            $id = Orders::create([
                'user_id' => Auth::id(),
                'last_price' => $total_price,
                'last_discount' => $taxation,
                'price_with_taxation' => $price_with_taxation,
                'status' => 1,
                'status_payment' => 1,
                'order_number' => $order_number,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ])->id;

            foreach(Session::get('product') as $item)
            {
                OrderProducts::create([
                    'user_id' => Auth::id(),
                    'order_id' => $id,
                    'product_id' => $item->id,
                    'product_name' => $item->product_name,
                    'product_price' => $item->price,
                    'discount' => $item->discount,
                    'product_quantity' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
            //SMS
            $mobile = '09193109312';
            $code = $order_number;
            $dataSms = array(
                array(
                    "Parameter" => "OrderNumber",
                    "ParameterValue" => $code,
                ),

                array(
                    "Parameter" => "User",
                    "ParameterValue" => Auth::user()->name . "-" . Auth::id(),
                ),
            );
            Sms::dispatch($mobile, $dataSms, '61304');


            return Response::json(['status' => '1', 'desc' =>'ثبت محصول با موفقیت انجام شد.']);

        } else {
            return Response::json(['status' => '0', 'desc' => "سبد خرید خود را مجدد تایید فرمایید!"]);
        }
    }




    public function cartCalculator(Request $request){
        $product = Product::where('id' , $request->product_id)->first();
        if (Session::has('product') && count(Session::get('product')) > 0){
                foreach (Session::get('product') as $item){
                    if ($product->id == $item['id']){
                        $item['total_price'] = $request->quantity * $product->price;
                        $item['order_quantity'] = $request->quantity;
                        return Response::json(["status" => "1" , 'desc' => "تغییرات اعمال شد"]);
                    }
                }
        }else{
            return Response::json(['status'=>'0', 'desc' => "متاسفانه مشکلی پیش آمده است!"]);
        }
    }


    public function CartProductDelete(Request $request){
        if (Session::has('product') && count(Session::get('product')) > 0){
            foreach (Session::get('product') as $key => $value){
                if ($key == $request->key){
                    Session::forget('product.' . $request->key);
                    toast('حذف محصول از سبد خرید با موفقیت انجام شد' , "success");
                    return back();
                }elseif (count(Session::get('product')) == 0){
                    toast('حذف محصول از سبد خرید با موفقیت انجام شد' , "success");
                    return back();
                }
            }
        }
    }
    public function showSessionCart(){
        return Session::get('product');
    }
    public function showShippingCart(){
        return Session::get('shipping');
    }
    public function forgetSessionCart(){
        return Session::forget('product');
    }
    public function forgetShippingCart(){
        return Session::forget('shipping');
    }
    public function BeforeBuying(Request $request){
        if (Session::has('product') && count(Session::get('product')) > 0){
            Session::forget('shipping');
                $shipping = Array(
                    'total_price' => $request->total_price,
                    'taxation' => $request->taxation,
                    'price_with_taxation' => $request->price_with_taxation,
                );
                Session::put('shipping' , $shipping);
                return Response::json(['status'=>'1']);

        }else{
            return Response::json(['status'=>'0', 'desc' => "سبد خرید خود را مجدد تایید فرمایید!"]);
        }
    }

    public function shoppingPeymentpage(){
        return view('profile.shopping_peyment');
    }

      public function shoppingComplete($ref){
        $order = Orders::where('user_id',Auth::id())->where("bank_token",$ref)->first();
        return view('profile.shopping_complete',['order' => $order]);
    }

    public function shoppingPeyment(Request $request){
        if (Auth::check() && Auth::id() > 0){
            if (Session::has('product') && count(Session::get('product')) > 0) {
                $discount= number_format(($request->total_discount * 100)/ $request->order_price);
                Session::forget('shipping');
                Session::put('shipping', ['id' => $request->id, 'discount' => $discount, 'order_price' => $request->order_price, 'total_discount' => $request->total_discount, 'last_price' => $request->last_price]);
            }
            return Response::json(['status' => 1 , "desc" =>"تکمیل سبد خرید و پرداخت"]);
        }else{
            return Response::json(['status'=>'0', 'desc' => "ابتدا وارد سایت شوید یا ثبت نام کنید"]);
        }
    }

    public function AddProduct()
    {
        $product = Product::orderBy('id', 'desc')->where('user_id', Auth::id())->where('status', 1)->paginate(2);
        return view('profile.add_product', ["user" => Auth::user(), "product" => $product, "menu" => "add_product"]);
    }

    public function AddProductAction(Request $request)
    {

        $request = $request->replace(self::faToEn($request->all()));

        $request->validate([
            'name' => 'required|min:3|max:56',
            'price' => 'required|min:3|max:20',
            'mobile' => 'required|min:11|max:11',
            'desc' => 'required|min:10|max:10000',
            'discount' => 'required|min:1|max:3',
            'quantity' => 'required|min:1|max:4',
            'stock' => 'required|max:1',
            'file' => 'image|nullable|dimensions:min_width=400,min_height=400|max:2048',
        ]);


        $imageName = null;
        if (isset($request->file) && strlen($request->file) > 0) {

            $exists = Storage::disk('vms')->exists($request->file('file')->getClientOriginalName());

            if ($exists == true) {

                $imageName = time();
                $imageName = $imageName . "-" . $request->file('file')->getClientOriginalName();

                $img = Image::make('images/shop/products/' . pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_BASENAME));
                $img->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img->save('images/shop/products/' . $imageName);

            } else {

                $imageName = $request->file('file')->getClientOriginalName();
                $img = Image::make($request->file('file'))->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img->save('images/shop/products/' . $imageName);

            }

        }


        Product::create([
            "user_id" => Auth::id(),
            "category_id" => "2",
            "product_name" => $request->name,
            "product_slug" => self::slug($request->name),
            "price" => $request->price,
            "mobile" => $request->mobile,
            "product_desc" => htmlentities($request->desc),
            "discount" => $request->discount,
            "status" => 1,
            "quantity" => $request->quantity,
            "stock" => $request->stock,
            "image" => $imageName,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        session()->flash("status", "ثبت کالا با موفقیت انجام شد");

        return back();

    }

    public function DeleteProductAction(Request $request)
    {

        $request = $request->replace(self::faToEn($request->all()));

        if (isset($request->id) && is_numeric($request->id) && $request->id > 0) {

            $product = Product::where('id', $request->id)->where("user_id", Auth::id())->first();

            if (isset($product->id)) {

                Product::where('id', $request->id)->where("user_id", Auth::id())->update(array('status' => 0));

                return response()->json(['errors' => 0]);

            }

            return response()->json(['errors' => 1, "desc" => "این پست وجود ندارد یا مطعلق به شما نمیباشد"]);

        }

        return response()->json(['errors' => 1, "desc" => "حذف پست انجام نشد"]);


    }

    public function ViewProductSingle($id)
    {

        if (isset($request->id) && is_numeric($request->id) && $request->id > 0) {

            $product = Product::where('id', $id)->where("user_id", Auth::id())->first();

            if (isset($product->id)) {

                return view('profile.single_product', ["product" => $product, "menu" => "add_product"]);

            }

            return null;

        }

        return null;

    }

    public function EditProductSingle($id)
    {

        $id = self::faToEn($id);

        if (isset($id) && is_numeric($id) && $id > 0) {

            $product = Product::where('id', $id)->where("user_id", Auth::id())->first();

            if (isset($product->id)) {

                return view('profile.edit_product', ["product" => $product, "menu" => "add_product"]);

            }

            return null;

        }

        return null;

    }

    public function EditProductSingleAction(Request $request)
    {

        $request = $request->replace(self::faToEn($request->all()));

        $request->validate([
            'id' => 'required',
            'name' => 'required|min:3|max:56',
            'price' => 'required|min:3|max:56',
            'mobile' => 'required|min:3|max:14',
            'desc' => 'required|min:10|max:10000',
            'discount' => 'required|min:1|max:16',
            'quantity' => 'required|min:1|max:128',
            'stock' => 'required|max:10',
            'file' => 'image|nullable|dimensions:min_width=400,min_height=400|max:2048',
        ]);

        $checkProduct = Product::where("id", $request->id)->where("user_id", Auth::id())->first();

        if (isset($checkProduct->id)) {

            if (isset($request->file) && strlen($request->file) > 0) {

                $imageName = null;

                $exists = Storage::disk('vms')->exists($request->file('file')->getClientOriginalName());

                if ($exists == true) {

                    $imageName = time();
                    $imageName = $imageName . "-" . $request->file('file')->getClientOriginalName();

                    $img = Image::make('images/shop/products/' . pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_BASENAME));
                    $img->resize(400, 400, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $img->save('images/shop/products/' . $imageName);

                } else {

                    $imageName = $request->file('file')->getClientOriginalName();
                    $img = Image::make($request->file('file'))->resize(400, 400, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $img->save('images/shop/products/' . $imageName);

                }


                Product::where("id", $request->id)->where("user_id", Auth::id())->update([
                    "image" => $imageName
                ]);

            }

            Product::where("id", $request->id)->where("user_id", Auth::id())->update([
                "user_id" => Auth::id(),
                "category_id" => "2",
                "product_name" => $request->name,
                "product_slug" => self::slug($request->name),
                "price" => $request->price,
                "mobile" => $request->mobile,
                "product_desc" => htmlentities($request->desc),
                "discount" => $request->discount,
                "status" => 1,
                "quantity" => $request->quantity,
                "stock" => $request->stock,
                "updated_at" => Carbon::now(),
            ]);

            session()->flash("status", "ویرایش کالا با موفقیت انجام شد");

            return back();

        }

        return back();

    }

    public function StoreBio()
    {

        $bio = Store::where("user_id", Auth::id())->first();

        return view("profile.bio", ["bio" => $bio, "menu" => "bio"]);
    }

    public function StoreBioAction(Request $request)
    {

        $request = $request->replace(self::faToEn($request->all()));

        $request->validate([
            'bio' => 'required|min:10|max:10000',
        ]);

        Store::where("user_id", Auth::id())->update([
            "about" => $request->bio
        ]);

        session()->flash("status", "بیوگرافی فروشگاه با موفقیت ثبت شد");

        return back();

    }

    public function ProfileEdit()
    {
        return view("profile.profile", ["user" => Auth::user(), "menu" => "profile"]);
    }

    public function ProfileEditAction(Request $request)
    {
//        $request = $request->replace(self::faToEn($request->all()));
        $validator = Validator::make($request->all(), [
            'email' => 'nullable|email|max:255',
//            'sex' => 'nullable|max:1',
            'address' => 'nullable',
            'name' => 'nullable|max:255',
            'family' => 'nullable|max:255',
            'phone' => 'nullable',
//            'state' => 'nullable|max:3',
//            'bank_cart_number' => 'nullable',
            'national_code' => 'nullable|numeric|digits:10',
//            'sheba' => 'nullable|digits:24',
            "password" => 'nullable|min:6'
        ]);

        if ($validator->fails()) {
            return Response::json(["status" => "0", "desc" => $validator->errors()->first()]);
        }

        $user = Auth::user();

        if ($user->verified_email == 0 && !Cache::has("email_code_" . $user->id)) {
            User::where("mobile", $user->mobile)->update([
                "email" => $request->email,
            ]);
        }

        User::where("mobile", $user->mobile)->update([
            "name" => $request->name,
            "family" => $request->family,
            "updated_at" => Carbon::now()
        ]);

        Profile::where("user_id", Auth::id())->update([
//            "bank_cart_number" => $request->bank_cart_number,
            "national_code" => $request->national_code,
//            "sheba" => $request->sheba,
            "phone" => $request->phone,
            "address" => $request->address,
//            "gender" => $request->sex,
//            "city_code" => $request->state,
        ]);

//        if ($user->verified_email == 0 && isset($request->email) && strlen($request->email)) {
//            if (Cache::has("email_code_" . $user->id, true,)) {
//                session()->flash("error", "تا 10 دقیقه امکان تغییر ایمیل را ندارید");
//                return back();
//            } else {
//                $exist = User::where('email', $request->email)->where('verified_email', 1)->exists();
//                if ($exist == true) {
//                    session()->flash("error", "ایمیل وارد شده تکراری می باشد");
//                    return back();
//                } else {
//                    $code = Str::random(16);
//                    $userID = Auth::id();
//                    $email = $request->email;
//                    $url = route("email_verify_action", ["awpf" => base64_encode($userID), "ccew" => base64_encode($email), "prmy" => base64_encode($code)]);
//                    $content = $url;
//                    User::where("id", $userID)->where("email", $email)->update([
//                        "email_code" => $code,
//                    ]);
//                    $view = 'verify_email';
//                    $subject = 'لینک تایید رایانامه شما';
//                    $title = 'پشتیبانی سایت فروشگاه آرمان';
//                    self::email($email, $view, $content, $title, $subject);
//                    session()->flash("error", "لینک تایید به ایمیل شما ارسال شد");
//                    Cache::put("email_code_" . $user->id, true, 600);
//                }
//            }
//        }

        if (isset($request->password) && strlen($request->password)) {
            User::where("mobile", $user->mobile)->update([
                "password" => Hash::make($request->password),
                "password_changed" => 1,
            ]);
            return Response::json(["status" => "1", "desc" => "پروفایل با موفقیت بروزرسانی شد"]);
        }

        return Response::json(["status" => "1", "desc" => "پروفایل با موفقیت بروزرسانی شد"]);
    }

    public function EmailVerifyAction(Request $request)
    {

        if (isset($request->awpf) && isset($request->ccew) && isset($request->prmy)) {

            $code = base64_decode($request->prmy);
            $userID = base64_decode($request->awpf);;
            $email = base64_decode($request->ccew);;

            $user = User::where("id", $userID)->where("email", $email)->where("email_code", $code)->first();

            if (isset($user->id)) {

                if ($user->verified_email == 0) {

                    User::where("id", $userID)->where("email", $email)->where("email_code", $code)->where("verified_email", 0)->update([
                        "verified_email" => 1,
                        "email_verified_at" => Carbon::now()
                    ]);

                    return view("auth.email_verify", ["verify" => 0]);

                } else if ($user->verified_email == 1) {

                    return view("auth.email_verify", ["verify" => 1]);

                }

            }

            return view("auth.email_verify", ["verify" => 2]);

        }

    }

    public function Bookmark(Request $request)
    {
        if (isset($request->product_id)){
            $bookmark = Bookmark::where('user_id', Auth::id())->where('product_id' , $request->product_id)->exists();
            if ($bookmark == 1){
                return Response::json(["status" => "0" , "desc" => 'این محصول را قبلا در لسیت علاقه مندی ها اضافه کرده اید!']);
            }
            Bookmark::create([
                'product_id' => $request->product_id,
                'user_id' => Auth::id(),
                'created_at' => Carbon::now(),
            ]);
            return Response::json(["status" => "1" , "desc" => 'محصول با موفقیت در لیست علاقه مندی ها ثبت شد']);
        }
    }

    public function myWebService()
        {

            $api = Accounting::where("user_id", Auth::id())->where('delete' , 0)->get();

            return view("profile.webservice", ["api" => $api, "user" => Auth::user(), "menu" => "webservice"]);

        }

    public function deleteMyWebService(Request $request){
        Accounting::where('id', $request->id)->where('user_id', Auth::id())->update([
            'delete' => 1,
            'deleted_at' => Carbon::now(),
        ]);
        return Response::json(['status' => 1, 'desc' => "حذف سرویس با موفقیت انجام شد"]);
    }


    public function BookmarkDelete(Request $request)
    {
        if (isset($request->id)) {
            Bookmark::where("user_id", Auth::id())->where("id", $request->id)->delete();
            return response()->json(['status' => "1", "desc" => "محصول با موفقیت از لیست حذف گردید"]);
        }
        return response()->json(['status' => "0", "desc" => "مشکلی پیش آمده است، لطفا دوباره تلاش کنید"]);
    }

    public function likeDelete(Request $request)
    {
        if (isset($request->id)) {
            Like::where("user_id", Auth::id())->where("id", $request->id)->delete();
            return response()->json(['status' => "1", "desc" => "محصول با موفقیت از لیست حذف گردید"]);
        }
        return response()->json(['status' => "0", "desc" => "مشکلی پیش آمده است، لطفا دوباره تلاش کنید"]);
    }

    public function Qrcode()
    {

        return view("profile.qrcode", ["menu" => "qrcode"]);

    }

    public function QrcodeAction(Request $request)
    {

        $request = $request->replace(self::faToEn($request->all()));

        if (isset($request->membership_number) && isset($request->amount) && is_numeric($request->amount) && $request->amount > 0) {

            $user = self::membershipNumberDecode($request->membership_number);

            if (isset($user->id)) {

                Statement::create([
                    "from_user_id" => Auth::id(),
                    "to_user_id" => $user->id,
                    "amount" => $request->amount,
                    "desc" => $request->desc,
                    "type" => "cart-to-cart",
                    "status" => "pending",
                    "created_at" => Carbon::now(),
                ]);

                $store = Store::where("user_id", $user->id)->first();

                return ["status" => true, "name" => $store->shop . " " . $store->branch, "amount" => number_format($request->amount)];

            }

            return ["status" => false];

        }

        return ["status" => false];

    }

    public function QrcodeActionMobile(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'code' => 'required|digits:5'
        ]);

        if ($validate->fails()) {
            return Response::json(["status" => "0", "desc" => "کد وارد شده اشتباه می باشد"]);
        }

    }

    public function ProfileGold()
    {

        $payment = Payment::where("type", "GOLD")->where("user_id", Auth::id())->where("status", "SUCCESS")->first();

        return view("profile.gold", ["payment" => $payment, "menu" => "gold"]);

    }

    public function ProfileGoldOnlineAction(Request $request)
    {

        $request = $request->replace(self::faToEn($request->all()));

        return PaymentController::PaymentGold();

    }


    //Jquery Cropper
    public function uploadCropImage(Request $request)
    {

        $folderPath = public_path('upload/');

        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $imageName = uniqid() . '.png';

        $imageFullPath = $folderPath . $imageName;

        file_put_contents($imageFullPath, $image_base64);

        $saveFile = new Picture;
        $saveFile->name = $imageName;
        $saveFile->save();

        return response()->json(['success' => 'Crop Image Uploaded Successfully']);
    }

    //Jquery Cropper

    public function ProfileCredit()
    {
        $user = User::where('id', Auth::id())->first();
        $payments = Payment::orderBy('created_at', 'desc')->where('user_id', Auth::id())->paginate(2);
        return view('profile.credit', ["user" => $user, "payments" => $payments, "menu" => "credit"]);
    }

    public function orders(){
        $orders = Orders::where('user_id', Auth::id())->get();
        return view('profile.orders',['user' => Auth::user(),'orders' => $orders, 'menu' => "orders"]);
    }

    public function orderDetails($order_id){
        $order = Orders::where('id', $order_id)->first();
        $products = OrderProducts::where('order_id', $order_id)->where('user_id', Auth::id())->get();
        return view('profile.order_details',['products' => $products, 'user' => Auth::user(), 'menu' => null, 'order' => $order]);
    }

    public function linkBuilder(Request $request){
        $order = Orders::where('user_id',Auth::id())->where('id',$request->order_id)->first();
        $userID = Auth::id();
        if (Auth::user()->email == null && Strlen(Auth::user()->email) == 0){
            return Response::json(["status" => "0" , 'desc' => 'ابتدا به پروفایل کاربری رفته و ایمیل خود را ثبت کنید']);
        }else{
            $email = Auth::user()->email;
            $url = route("incoming_download_link", ["dlid" => base64_encode($userID), "dlt" => base64_encode($order->download_token), "orid" => base64_encode($order->id)]);
            $content = $url;
            $view = 'download_email';
            $subject = 'با تشکر از شما برای خرید از آرمان';
            $title = 'لینک دانلود فایل / armanmask.ir';
            self::email($email, $view, $content, $title, $subject);
            Cache::put("download_link_" . Auth::id(), true, 600);
            return Response::json(["status" => "1" , 'desc' => 'لینک دانلود به ایمیل شما ارسال شد']);
        }
    }

    public function incomingDownloadLink(Request $request){
        $user_id = base64_decode($request->dlid);
        $token = base64_decode($request->dlt);
        $order_id = base64_decode($request->orid);
        $product_links = [];
        $order = Orders::where('user_id', $user_id)->where('id', $order_id)->where('download_token',$token)->first();
        foreach ( json_decode($order->product_id) as $product){
            $oneProduct = Product::where('id', $product)->first();
            array_push($product_links, $oneProduct);
        }
        return view('profile.download_links', ['product_links' => $product_links, 'order' => $order]);
    }

    public function purchaseDownload (Request $request){
        $order = Orders::where('id', $request->order_id)->where('user_id', Auth::id())->first();
        $product = Product::where('id', $request->product_id)->first();
        if  (Download::where('user_id', Auth::id())->where('product_id',$product->id)->where('token', $order->download_token)->where('download_count', '>=', 3 )->exists()){
            return Response::json(["status" => "0" ,'desc' => "شما بیش از 3 بار این فایل را دانلود کرده اید"]);
        }else{
            $filename = $product->file;
            $file_path = public_path('uploads/file/'.$filename);
            $count = 0;
            $download_row = Download::where('user_id', Auth::id())->where('product_id',$product->id)->where('token', $order->download_token)->first();
            if (isset($download_row)){
                $count = $count + $download_row->download_count;
                Download::where('user_id', Auth::id())->where('product_id',$product->id)->where('token', $order->download_token)->update([
                    "download_count" => $count + 1,
                    "downloaded_at" => Carbon::now(),
                ]);
                return response()->download($file_path);
            }else{
                Download::insert([
                    "user_id" => Auth::id(),
                    "product_id" => $request->product_id,
                    "order_id" => $request->order_id,
                    "token" => $order->download_token,
                    "download_count" => $count + 1,
                    "downloaded_at" => Carbon::now(),
                ]);
                return response()->download($file_path);
            }
        }
    }


    public function CreditAction(Request $request)
    {
        $request = $request->replace(self::faToEn($request->all()));

        $credit = filter_var($request->credit, FILTER_SANITIZE_NUMBER_INT);

        if ($credit >= 10000) {
            if (!empty(Auth::user()->name)) {

                $invoice_number = Str::random(4) . "_" . Auth::id();
                $amount = $credit;
                $merchantId = self::MerchantId;
                $admin_email = self::admin_email;
                $sha1Key = self::sha1Key;

                $_SESSION['merchantId'] = $merchantId;
                $_SESSION['sha1Key'] = $sha1Key;
                $_SESSION['admin_email'] = $admin_email;
                $_SESSION['amount'] = $amount;
                $_SESSION['PayOrderId'] = $invoice_number;
                $_SESSION['fullname'] = Auth::user()->name ?? "";
                $_SESSION['email'] = Auth::user()->email ?? "";
                $revertURL = "http://localhost:8000/incoming-credit";

                $client = new SoapClient('https://ikc.shaparak.ir/XToken/Tokens.xml', array('soap_version' => SOAP_1_1));
                $params['amount'] = $_SESSION['amount'];
                $params['merchantId'] = $merchantId;
                $params['invoiceNo'] = $invoice_number;
                $params['paymentId'] = "";
                $params['specialPaymentId'] = $invoice_number;
                $params['revertURL'] = $revertURL;
                $params['description'] = "";
                $result = $client->__soapCall("MakeToken", array($params));
                $_SESSION['token'] = $result->MakeTokenResult->token;
                $data['token'] = $_SESSION['token'];
                $data['merchantId'] = $_SESSION['merchantId'];
                Payment::create([
                    "user_id" => Auth::id(),
                    "invoice_number" => $invoice_number,
                    "amount" => $amount,
                    "status" => "PENDING",
                    "type" => "PERCENT_GIFT",
                    "json_result_payment" => "",
                    "json_result_verify" => "",
                    "token" => $result->MakeTokenResult->token,
                    "created_at" => Carbon::now()
                ]);
                PaymentController::redirect_post('https://ikc.shaparak.ir/TPayment/Payment/index', $data);
            } else {
                Session::flash("error",
                    '<div class="alert alert-danger text-center mb-2">' . "متاسفانه همچنان فرم " . '<a target="_blank" class="text-primary" href=' . route("profile_edit") . '>' . "تنظیمات کاربری" . '</a>' . " را تکمیل نکرده اید" . '</div>');
                return back();
            }
        } else {
            session()->flash("error", "مبلغ وارد شده صحیح نسیت");
            return back();
        }
    }

    public function myTickets(){
        $ticket = Ticket::where('user_id', Auth::id())->where('delete', 0)->get();
        return view('profile.my_tickets', ['user' => Auth::user(), 'menu'=>"ticket", 'ticket' => $ticket]);
    }

    public function newTicket(Request $request){
        if (Auth::check() && Auth::id() > 0) {
            $validator = Validator::make($request->all(), [
               'subject' => 'required|min:5|max:255',
               'message' => 'required|min:5|max:9999',
               'priority' => 'nullable',
               'unit' => 'nullable',
            ]);
            if ($validator->fails()) {
                return Response::json(["status" => "0", "desc" => $validator->errors()->first()]);
            }
            Ticket::create([
                'user_id' => Auth::id(),
                'subject' => $request->subject,
                'message' => $request->message,
                'status' => 1,
                'priority' => $request->priority,
                'created_at' => Carbon::now(),
                'unit' => $request->unit,
            ]);
            return Response::json(["status" => "1", "desc" => "پیام شما با موفقیت ثبت شد"]);
        }
        return Response::json(["status" => "0", "desc" => "ابتدا وارد سایت شوید"]);
    }

    public function getAnswer(Request $request){
        $answer = Ticket::where('parent_id', $request->id)->first();
        if (isset($answer[0]->id) && $answer[0]->id > 0) {
            return view('profile.answer_modal', ['answer' => $answer]);
        }else{
            return view('profile.answer_modal', ['answer' => $answer]);
        }
    }

    public function deleteTicket(Request $request){
        Ticket::where('id', $request->id)->where('user_id', Auth::id())->update([
            'delete' => 1,
            'deleted_at' =>Carbon::now(),
        ]);
        return Response::json(['status' => 1, 'desc' => "حذف پیام با موفقیت انجام شد"]);
    }

    public function newComment(Request $request){
        if (Auth::check() && Auth::id() > 0) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:5|max:255',
                'product_id' => 'required',
                'mobile' => 'required|digits:11|regex:/(09)[0-9]{9}/',
                'description' => 'required|min:10',
            ]);
            if ($validator->fails()) {
                Session::flash("errors" , $validator->errors()->first());
                return back();
            }
            $comment = Comment::where('user_id', Auth::id())->where('product_id', $request->product_id)->exists();
            if ($comment == 1){
                Session::flash("errors" , "شما قبلا نظر خود را ثبت کرده اید!");
                return back();
            }
            Comment::create([
                'comment_for' => "single_product",
                'product_id' => $request->product_id,
                'user_id' => Auth::id(),
                'name' => $request->name,
                'mobile' => $request->mobile,
                'desc' => $request->description,
                'status' => 0,
                'created_at' => Carbon::now(),
            ]);
            Session::flash("status" , "پیام شما با موفقیت ثبت شد");
            return back();
        }else{
            Session::flash("errors" , "ابتدا وارد سایت شوید");
            return back();
        }

    }

    public function CartTransfer()
    {
        return view("profile.shipping");
    }

    public function CartTransferAction(Request $request)
    {

        $request = $request->replace(self::faToEn($request->all()));

        $request->validate([
            'bank' => 'required|min:3|max:255',
            'tracking' => 'required|min:3|max:255',
            'amount' => 'required',
            'date' => 'required|min:3|max:255',
            'time' => 'required|min:3|max:255',
            'desc' => 'required|min:5|max:255',
        ]);

        CartTransfer::create([
            "bank" => $request->bank,
            "tracking" => $request->tracking,
            "date" => $request->date,
            "time" => $request->time,
            "desc" => $request->desc,
            "status" => "PENDING"
        ]);

        session()->flash("status", "فرم شما با موفقیت ثبت شد. پس از تایید تراکنش توسط پشتیبانی , اعتبار شما افزایش خواهد یافت");

        return back();

    }

}
