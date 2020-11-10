<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Category;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Statement;
use App\Models\Store;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Morilog\Jalali\Jalalian;
use phpDocumentor\Reflection\DocBlock\Tags\See;
use function PHPUnit\Framework\returnArgument;

class ProfileController extends Controller
{

    public function Index()
    {
        return view("profile.index", ["user" => Auth::user(), "menu" => "index"]);
    }

    public function Store(Request $request)
    {

        $result = Store::where("user_id", Auth::id())->first();

        $category = Category::all();

        return view("profile.store", ["result" => $result, "category" => $category, "menu" => "store"]);

    }

    public function StoreEditAction(Request $request)
    {
        $request = $request->replace(self::faToEn($request->all()));
        if ($request->nature == 1) {
            $request->validate([
                'shop' => 'required|min:3|max:128',
                'name' => 'required|min:2|max:60',
                'category' => 'required|min:1',
                'telephone' => 'nullable|digits:8',
                'melli_code' => 'required|digits:10',
                'address' => 'required',
            ]);
            Store::where('id',$request->id)->update([
                'user_id' => Auth::id(),
                'shop' => $request->shop,
                'name' => $request->name,
                'category' => $request->category,
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
                'legal_mobile' => 'required|digits:11',
                'legal_telephone' => 'required|digits:8',
                'legal_branch' => 'nullable|min:3|max:100',
                'legal_category' => 'required|min:1',
                'legal_kind_of' => 'required|min:1',
                'shenase_melli' => 'nullable|min:3|max:32',
                'registration_number' => 'nullable|min:3|max:32',
                'legal_melli_code' => 'required|digits:10',
                'legal_address' => 'required',
            ]);
            Store::where('id',$request->id)->update([
                'user_id' => Auth::id(),
                'shop' => $request->legal_shop,
                'name' => $request->legal_name,
                'ceo_mobile' => $request->legal_mobile,
                'telephone' => $request->legal_telephone,
                'branch' => $request->legal_branch,
                'category' => $request->legal_category,
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
                'branch' => 'nullable|min:3|max:100',
                'nature' => 'required|min:1',
                'category' => 'required|min:1',
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
                'shenase_melli' => $request->shenase_melli,
                'telephone' => $request->telephone,
                'name' => $request->name,
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
                'legal_mobile' => 'required|digits:11',
                'legal_telephone' => 'required|digits:8',
                'legal_branch' => 'nullable|min:3|max:100',
                'nature' => 'required|min:1',
                'legal_category' => 'required|min:1',
                'legal_kind_of' => 'required|min:1',
                'legal_service' => 'required|min:1|max:128',
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
            $check_shop = Store::where('shop' , $request->legal_shop)->exists();
            if ($check_shop == false){
                Store::create([
                    'user_id' => Auth::id(),
                    'shop' => $request->legal_shop,
                    'name' => $request->legal_name,
                    'ceo_mobile' => $request->legal_mobile,
                    'telephone' => $request->legal_telephone,
                    'branch' => $request->legal_branch,
                    'nature' => $request->nature,
                    'category' => $request->legal_category,
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
            }else{
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

    public function Products()
    {

        $product = Product::orderBy('id', 'desc')->where('user_id', Auth::id())->where('status', 1)->paginate(20);

        return view('profile.products', ["product" => $product, "menu" => "products"]);

    }

    public function AddProduct()
    {

        $products = Product::orderBy('id', 'desc')->where('user_id', Auth::id())->where('status', 1)->limit(6)->get();

        return view('profile.add_product', ["user" => Auth::user(), "products" => $products, "menu" => "add_product"]);

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
        $request = $request->replace(self::faToEn($request->all()));

        $request->validate([
            'email' => 'nullable|email|max:255',
            'sex' => 'nullable|max:1',
            'name' => 'nullable|max:255',
            'phone' => 'nullable',
            'state' => 'nullable|max:3',
            'bank_cart_number' => 'nullable|numeric|digits:16',
            'sheba' => 'nullable|digits:24',
            "password" => 'nullable|min:6'
        ]);

        $user = Auth::user();

        if ($user->verified_email == 0 && !Cache::has("email_code_" . $user->id)) {
            User::where("mobile", $user->mobile)->update([
                "email" => $request->email,
            ]);
        }

        User::where("mobile", $user->mobile)->update([
            "name" => $request->name,
            "updated_at" => Carbon::now()
        ]);

        Profile::where("user_id", $user->id)->update([
            "bank_cart_number" => $request->bank_cart_number,
            "sheba" => $request->sheba,
            "phone" => $request->phone,
            "gender" => $request->sex,
            "city_code" => $request->state,
        ]);

        if ($user->verified_email == 0 && isset($request->email) && strlen($request->email)) {
            if (Cache::has("email_code_" . $user->id, true,)) {
                session()->flash("error", "تا 10 دقیقه امکان تغییر ایمیل را ندارید");
                return back();
            } else {
                $exist = User::where('email', $request->email)->where('verified_email', 1)->exists();
                if ($exist == true) {
                    session()->flash("error", "ایمیل وارد شده تکراری می باشد");
                    return back();
                } else {
                    $code = Str::random(16);
                    $userID = Auth::id();
                    $email = $request->email;
                    $url = route("email_verify_action", ["awpf" => base64_encode($userID), "ccew" => base64_encode($email), "prmy" => base64_encode($code)]);
                    $content = $url;
                    User::where("id", $userID)->where("email", $email)->update([
                        "email_code" => $code,
                    ]);
                    $view = 'verify_email';
                    $subject = 'لینک تایید رایانامه شما';
                    $title = 'پشتیبانی سایت ثمین تخفیف';
                    self::email($email, $view, $content, $title, $subject);
                    session()->flash("error", "لینک تایید به ایمیل شما ارسال شد");
                    Cache::put("email_code_" . $user->id, true, 600);
                }
            }
        }

        if (isset($request->password) && strlen($request->password)) {
            User::where("mobile", $user->mobile)->update([
                "password" => Hash::make($request->password),
                "password_changed" => 1,
            ]);
            session()->flash("status", "پروفایل و رمز عبور شما با موفقیت بروزرسانی شد");
        }

        session()->flash("status", "پروفایل با موفقیت بروزرسانی شد");
        return back();

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

    public function Bookmark()
    {

        $bookmark = Bookmark::where("user_id", Auth::id())->get();

        return view("profile.bookmark", ["bookmark" => $bookmark, "menu" => "bookmark"]);

    }

    public function BookmarkDelete(Request $request)
    {

        if (isset($request->store)) {

            Bookmark::where("user_id", Auth::id())->where("store_id", $request->store)->delete();

            return response()->json(['status' => "1", "desc" => "فروشگاه مورد نظر با موفقیت از لیست شما حذف شد"]);

        }

        return response()->json(['status' => "0", "desc" => "مشکلی پیش آمده است لطفا دوباره تلاش کنید"]);

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

    public function ProfileGold()
    {

        return view("profile.gold", ["menu" => "gold"]);

    }

    public function ProfileGoldOnlineAction(Request $request)
    {

        $request = $request->replace(self::faToEn($request->all()));

        return response()->json(['errors' => 1]);

    }

    public function ProfileGoldCreditAction(Request $request)
    {

        $check = User::where("id", Auth::id())->first();

        if (isset($check->id) && $check->user_mode == "normal") {

            if ($check->credit > 440000) {

                DB::table("users")->where("id", Auth::id())->decrement("credit", 440000);

                User::where("id", Auth::id())->update([
                    "user_mode" => "gold"
                ]);


                return response()->json(['errors' => 0]);

            }

            return response()->json(['errors' => 1, "desc" => "اعتبار شما کمتر از حد نصاب می باشد"]);

        }

        return response()->json(['errors' => 1, "desc" => "شما قبلا عضو طلایی شده اید"]);

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

}
