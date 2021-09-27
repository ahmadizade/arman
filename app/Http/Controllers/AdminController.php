<?php

namespace App\Http\Controllers;

use App\Models\BlogTag;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Product_tag;
use App\Models\Report;
use App\Models\Setting;
use App\Models\Store;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Morilog\Jalali\Jalalian;
use phpDocumentor\Reflection\Types\Self_;
use function Sodium\increment;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    //admin-page
    public function armanmask()
    {
        $lastmonth = DB::table('users')->where('created_at', ">=", Carbon::today()->subMonth())->count();
        $lastweek = DB::table('users')->where('created_at', ">=", Carbon::today()->subWeek())->count();
        $today = DB::table('users')->where('created_at', ">=", Carbon::today())->count();
        $user_count = DB::table('users')->count();
        $product_count = DB::table('products')->count();
        $product_month = DB::table('products')->where('created_at', ">=", Carbon::today()->subMonth())->count();
        $product_week = DB::table('products')->where('created_at', ">=", Carbon::today()->subWeek())->count();
        $product_today = DB::table('products')->where('created_at', ">=", Carbon::today())->count();
        return view('admin.views.index', ['user_count' => $user_count, 'lastmonth' => $lastmonth, 'lastweek' => $lastweek, 'today' => $today, 'product_count' => $product_count, 'product_month' => $product_month, 'product_week' => $product_week, 'product_today' => $product_today]);
    }




    public function AdminUsers()
    {
        return view('admin.views.users');
    }

    public function seoPages()
    {
        return view('admin.views.seo.seo_pages');
    }

    public function homePageSeo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'home_page_title' => ['nullable', 'max:512',],
            'home_page_description' => ['nullable', 'max:512',],
            'main_text' => ['nullable'],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->first()]);
        }
        Setting::where('id', 1)->update([
            'home_page_title' => $request->home_page_title,
            'home_page_description' => $request->home_page_description,
            'main_text' => $request->main_text,
        ]);
        Session::flash('status', 'تغییرات با موفقیت انجام شد');
        return back();
    }

    public function extraPageSeo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'aboutus_page_title' => ['nullable', 'max:1024',],
            'aboutus_page_description' => ['nullable', 'max:1024',],
            'contactus_page_title' => ['nullable', 'max:1024',],
            'contactus_page_description' => ['nullable', 'max:1024',],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->first()]);
        }
        Setting::where('id', 1)->update([
            'aboutus_page_title' => $request->aboutus_page_title,
            'aboutus_page_description' => $request->aboutus_page_description,
            'contactus_page_title' => $request->contactus_page_title,
            'contactus_page_description' => $request->contactus_page_description,
        ]);
        Session::flash('status', 'تغییرات با موفقیت انجام شد');
        return back();
    }

    public function search_user(request $request)
    {
        $mobile = self::faToEn($request->mobile);

        $data = DB::table('users')->where('mobile', $mobile)->first();

        $validate = Validator::make($request->all(), [
            'mobile' => 'required|digits:11',
        ]);

        if ($validate->fails()) {
            return Response::json(["status" => "0", "desc" => "شماره موبایل اشتباه می باشد"]);
        } else {
            return Response::json($data);
        }
    }

    //save user change from admin first page
    public function save_user(request $request)
    {
        $validator = Validator::make($request->all(), [
            'res_mobile' => ['required', 'string', 'min:10', 'max:56',],
            'res_name' => ['required', 'string', 'min:5', 'max:128',],
            'res_role' => ['required', 'string', 'max:56',],
            'res_verified' => ['required', 'string', 'max:56',],
            'res_user_mode' => ['required', 'string', 'max:56'],
            'res_email' => ['string', 'min:10', 'max:128'],
            'res_credit' => ['string', 'max:56', 'nullable'],
            'res_password' => ['string', 'min:6', 'max:56', 'nullable'],
            'res_updated_at' => ['date', 'max:56', 'nullable'],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            $user = User::where('mobile', $request->res_mobile)->first();
            $user->name = $request->res_name;
            $user->mobile = $request->res_mobile;
            $user->role = $request->res_role;
            $user->verified = $request->res_verified;
            $user->user_mode = $request->res_user_mode;
            $user->email = $request->res_email;
            $user->credit = $request->res_credit;
            $password = Hash::make('$request->res_password');
            $user->password = $password;
            $user->updated_at = Carbon::now();
            $user->save();
            return Response::json(["status" => "1", "desc" => " ذخیره اطلاعات $request->res_name با موفقیت انجام شد "]);
        }
    }

//admin send sms to users
    public function SmsUser(Request $request)
    {
        $mobile = $request->mobile;
        $content = $request->sms_content;
        self::sms($mobile, $content);
        return "send-ok";
    }

    public function EmailUser(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $email = $user->email;
        $content = $request->email_content;
        $name = $user->name;
        $view = 'from_admin';
        $subject = 'Www.SaminTakhfif.Com';
        $title = 'پشتیبانی سایت فروشگاه آرمان';
        self::email($email, $view, $content, $title, $subject);
    }

    //save user change from admin first page
    public function GetUser()
    {
        return datatables()->of(DB::table('users'))->toJson();
    }

    public function DeleteUserAction(request $request)
    {
        $id = self::faToEn($request['id']);
        if (isset($id) && is_numeric($id) && $id > 0) {
            $user_delete = DB::table('users')->where('id', $request['id'])->delete();
            return "DONE";
        }
    }

    public function EditUserAction(request $request)
    {
        return view('admin.edit_user', ["id" => $request['id']]);
    }

    public function credit()
    {
        return view('admin.views.credit.credit');
    }

    public function SuggestionAction(Request $request)
    {
        $data = [];
        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::table("users")
                ->select("id", "name", "credit", "mobile")
                ->where('mobile', 'LIKE', "%$search%")->orWhere('name', 'LIKE', "%$search%")
                ->get();
        }
        return response()->json($data);
    }

    public function CreditShowAction(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        return Response::json($user);
    }

    public function CreditChargeAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'numeric', 'digits_between:1,5'],
            'new_credit' => ['required', 'numeric', 'digits_between:1,10'],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            $user = User::where('id', $request->user_id)->first();
            if ($request->new_credit > 0 && is_numeric($request->new_credit)) {
                if ($request->operation == 'sum') {
                    $credit = $user->credit + $request->new_credit;
                    $user->credit = $credit;
                    $user->save();
                    return response()->json(['sum' => 'done', 'credit' => $request->new_credit, 'credit_now' => $user->credit]);
                } elseif ($request->operation == 'minus') {
                    $credit = $user->credit - $request->new_credit;
                    $user->credit = $credit;
                    $user->save();
                    return response()->json(['minus' => 'done', 'credit' => $request->new_credit, 'credit_now' => $user->credit]);
                }
            } else {
                return response()->json(['errors' => "مقدار وارد شده صحیح نمی باشد"]);
            }
        }
    }

//CONTACT US  CONTACT US  CONTACT US  CONTACT US  CONTACT US  CONTACT US  CONTACT US  CONTACT US  CONTACT US
    public function ContactUs()
    {
        return view('admin.views.contactus');
    }

    public function ContactUs_GetUser()
    {
        return datatables()->of(DB::table('contact')->orderBy('created_at', 'desc'))->toJson();

    }

    //admin send sms to users
    public function ContactUs_SmsUser(Request $request)
    {
        {
            $data = Contact::where('id', $request->id)->first();
            $mobile = $data->mobile;
            $content = $request->sms_content;
            self::sms($mobile, $content);
            $data->answer_at = Carbon::now();
            $data->save();
        }
    }

    public function ContactUs_EmailUser(Request $request)
    {
        if (isset($request->mobile) && $request->mobile !== "") {
            $user = User::where('mobile', $request->mobile)->first();
        } else {
            $user = User::where('id', $request->user_id)->first();
        }
        if ($user == "" || $user->email == "") {
            return response()->json(['status' => 'متاسفانه این کاربر دارای ایمیل نیست']);
        } else {
            $email = $user->email;
            $content = $request->email_content;
            $view = 'from_admin';
            $subject = 'Www.SaminTakhfif.Com';
            $title = 'پاسخ ایمیل شما';
            self::email($email, $view, $content, $title, $subject);
            $data = Contact::where('id', $request->id)->first();
            $data->answer_at = Carbon::now();
            $data->save();
            return response()->json(['status' => 'ایمیل با موفقیت ارسال شد']);
        }
    }

    public function Product()
    {
        $last_product = Product::where('delete', 0)->orderByDesc('id')->paginate(10);
        $Product_tag = Product_tag::where('delete', 0)->get();
        return view('admin.views.product', ['last_product' => $last_product, 'Product_tag' => $Product_tag]);
    }

    public function product_SuggestionAction(Request $request)
    {
        $data = [];
        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::table("products")
                ->leftJoin('category', 'category.id', '=', 'products.category_id')
                ->where('product_name', 'LIKE', "%$search%")
                ->get(['products.*', 'category.name as category']);

        }
        return response()->json($data);
    }

    public function ProductShowAction(Request $request)
    {
//        $product = DB::table('products')->where('id', $request->id)
//            ->leftJoin('category', 'category.id', '=', 'products.category_id')
//            ->get(['products.*', 'category.name as category']);
        $product = Product::where('id', $request->id)->first();
        return $product;
    }

    public function ProductSaveAction(Request $request)
    {
        if ($request->status == 1) {
            Product::where('id', $request->id)->update(array('status' => 1));
            return response()->json(['status' => "کالا با موفقیت فعال شد"]);
        } elseif ($request->status == 0) {
            Product::where('id', $request->id)->update(array('status' => 0));
            return response()->json(['status' => "کالای مورد نظر غیر فعال شد"]);
        }
    }

    public function addTag(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'seo_title' => 'required',
            'seo_description' => 'required',
            'description' => 'nullable',
        ]);

        if ($validator->fails()) {
            session()->flash("errors", $validator->errors()->first());
            return back();
        }

        Product_tag::create([
            "name" => $request->name,
            "user_id" => Auth::id(),
            "slug" => self::slug($request->name),
            "seo_title" => $request->seo_title,
            "description" => $request->description,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        session()->flash("error", "برچسب با موفقیت ثبت شد");
        return back();
    }

    public function addCategoryPage()
    {
        $last_category = Category::orderByDesc('id')->where('delete', 0)->paginate();
        return view('admin.views.category.category', ['last_category' => $last_category]);
    }

    public function addTagPage()
    {
        $last_tag = Product_tag::orderByDesc('id')->where('delete', 0)->paginate();
        return view('admin.views.tag.tag', ['last_tag' => $last_tag]);
    }

    public function addCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:255',
            'seo_title' => 'nullable|max:65',
            'seo_description' => 'nullable',
            'seo_canonical' => 'nullable',
            'description' => 'nullable|min:2|max:9000000',
            'image' => 'required|max:9048',
        ]);

        if ($validator->fails()) {
            session()->flash("error", $validator->errors()->first());
            return back();
        }

        $image = null;
        if ($request->has('image')) {
            $imagePath = "/uploads/category/";
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            if (file_exists(public_path($imagePath) . $image)) {
                $image = Carbon::now()->timestamp . $image;
            }
            $file->move(public_path($imagePath), $image);
        }

        Category::create([
            "name" => $request->name,
            "slug" => self::slug($request->name),
            "seo_title" => $request->seo_title,
            "seo_description" => $request->seo_description,
            "seo_canonical" => $request->seo_canonical,
            "description" => $request->description,
            "image" => $image,
        ]);

        session()->flash("error", "برچسب با موفقیت ثبت شد");
        return back();
    }

    public function addTagg(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'seo_title' => 'required',
            'seo_description' => 'required',
            'description' => 'nullable',
        ]);

        if ($validator->fails()) {
            session()->flash("errors", $validator->errors()->first());
            return back();
        }

        Product_tag::create([
            "name" => $request->name,
            "user_id" => Auth::id(),
            "slug" => self::slug($request->name),
            "seo_title" => $request->seo_title,
            "description" => $request->description,
            "seo_description" => $request->seo_description,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        Session::flash('status', "افزودن برچسب با موفقیت انجام شد");
        return back();
    }

    public function addProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|min:2|max:255',
            'category' => 'nullable',
            'tag' => 'required',
            'price' => 'required|max:255',
            'discount' => 'nullable|max:3',
            'thumbnail' => 'nullable|max:2048',
            'description' => 'nullable|min:3|max:9000000',
            'seo_title' => 'nullable',
            'seo_description' => 'nullable',
            'seo_canonical' => 'nullable',
            'slider' => 'required',
            'slider.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:6048'
        ]);

        if ($validator->fails()) {
            session()->flash("errors", $validator->errors()->first());
            return back();
        }

        $thumbnail = null;
        if ($request->has('thumbnail')) {
            $image2Path = "/uploads/thumbnail/";
            $image2 = $request->file('thumbnail');
            $thumbnail = $image2->getClientOriginalName();
            if (file_exists(public_path($image2Path) . $thumbnail)) {
                $thumbnail = Carbon::now()->timestamp . $thumbnail;
            }
            $image2->move(public_path($image2Path), $thumbnail);
        }

        if ($request->hasfile('slider')) {
            foreach ($request->file('slider') as $image) {
                $slide = null;
                $imagePath = "/uploads/slider/";
                $picture = $image;
                $slide = $picture->getClientOriginalName();
                if (file_exists(public_path($imagePath) . $slide)) {
                    $slide = Carbon::now()->timestamp . $slide;
                }
                $names[] = $slide;
                $picture->move(public_path($imagePath), $slide);
            }
        }

        Product::create([
            'product_name' => $request->name,
            'product_slug' => self::slug($request->name),
            'category_id' => $request->category,
            'tag_id' => json_encode($request->tag, JSON_NUMERIC_CHECK),
            'discount' => $request->discount,
            'price' => str_replace(',', '', $request->price),
            'quantity' => 20000,
            'mobile' => Auth::user()->mobile,
            'user_id' => Auth::id(),
            'product_desc' => $request->description,
            'thumbnail' => $thumbnail,
            'slider' => json_encode($names),
            "status" => 1,
            "created_at" => Carbon::now(),
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_canonical' => $request->seo_canonical,
        ]);
        session()->flash("status", "محصول با موفقیت ثبت گردید");
        return back();
    }

    public function deleteProduct($id)
    {
        Product::where('id', $id)->update([
            'delete' => 1,
            'deleted_at' => Carbon::now(),
        ]);
        Session::flash('status', 'حذف محصول با موفقیت انجام شد');
        return back();
    }

    public function editProduct($id)
    {
        $product = Product::where('id', $id)->where('delete', 0)->first();
        $Product_tag = Product_tag::where('delete', 0)->get();
        return view('admin.views.product_edit', ['product' => $product, 'Product_tag' => $Product_tag]);
    }

    public function showProduct()
    {
        $last_product = Product::orderByDesc('id')->where('delete', 0)->paginate(15);
        return view('admin.views.product_show', ['last_product' => $last_product]);
    }

    public function deleteCategory($id)
    {
        Category::where('id', $id)->update([
            'delete' => 1,
            'deleted_at' => Carbon::now(),
        ]);
        Session::flash('status', 'حذف دسته بندی با موفقیت انجام شد');
        return back();
    }

    public function deleteTag($id)
    {
        Product_tag::where('id', $id)->update([
            'delete' => 1,
            'deleted_at' => Carbon::now(),
        ]);
        Session::flash('status', 'حذف برچسب با موفقیت انجام شد');
        return back();
    }

    public function editCategory($id)
    {
        $slcategory = Category::where('id', $id)->first();
        return view('admin.views.category.edit_category', ['slcategory' => $slcategory]);
    }

    public function editTag($id)
    {
        $sltag = Product_tag::where('id', $id)->first();
        return view('admin.views.tag.edit_tag', ['sltag' => $sltag]);
    }

    public function editCategoryAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'user_id' => 'nullable',
            'name' => 'required|min:2|max:255',
            'seo_title' => 'nullable',
            'seo_description' => 'nullable',
            'seo_canonical' => 'nullable',
            'description' => 'nullable|max:999999',
        ]);

        if ($validator->fails()) {
            session::flash("error", $validator->errors()->first());
            return back();
        }

        Category::where('id', $request->id)->update([
            'name' => $request->name,
            'slug' => self::slug($request->name),
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'description' => $request->description,
            'seo_canonical' => $request->seo_canonical,
        ]);
        session()->flash("status", "دسته بندی با موفقیت ویرایش گردید");
        return back();
    }

    public function editTagAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'user_id' => 'nullable',
            'name' => 'required|min:2|max:255',
            'seo_title' => 'nullable',
            'seo_description' => 'nullable',
            'description' => 'nullable|max:999999',
        ]);

        if ($validator->fails()) {
            session::flash("errors", $validator->errors()->first());
            return back();
        }

        Product_tag::where('id', $request->id)->update([
            'name' => $request->name,
            'user_id' => Auth::id(),
            'slug' => self::slug($request->name),
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'description' => $request->description,
//            'seo_canonical' => $request->seo_canonical,
        ]);
        session()->flash("status", "برچسب با موفقیت ویرایش گردید");
        return back();
    }

    public function adminEditproductAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'nullable',
            'name' => 'required|min:2|max:255',
            'category' => 'required',
            'tag' => 'required',
            'price' => 'nullable|max:255',
            'discount' => 'nullable|max:3',
            'description' => 'nullable|min:3|max:9000000',
            'seo_title' => 'nullable',
            'seo_description' => 'nullable',
            'seo_canonical' => 'nullable',
        ]);

        if ($validator->fails()) {
            session::flash("errors", $validator->errors()->first());
            return back();
        }

        Product::where('id', $request->id)->update([
            'product_name' => $request->name,
            'product_slug' => self::slug($request->name),
            'category_id' => $request->category,
            'tag_id' => json_encode($request->tag, JSON_NUMERIC_CHECK),
            'discount' => $request->discount,
            'price' => str_replace(',', '', $request->price),
            'quantity' => 20000,
            'mobile' => Auth::user()->mobile,
            'user_id' => Auth::id(),
            'product_desc' => $request->description,
            "created_at" => Carbon::now(),
            'framework' => $request->framework,
            'framework_version' => $request->framework_version,
            'framework_details' => $request->framework_details,
            'special_features' => $request->special_features,
            'short_description_of_backend' => $request->short_description_of_backend,
            'admin_pannel_features' => $request->admin_pannel_features,
            'framework_frontend_details' => $request->framework_frontend_details,
            'other_plugins' => $request->other_plugins,
            'data_usage' => $request->data_usage,
            'admin_pannel' => $request->admin_pannel,
            'framework_frontend' => $request->framework_frontend,
            'framework_frontend_version' => $request->framework_frontend_version,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_canonical' => $request->seo_canonical,
            'updated_at' => Carbon::now(),
        ]);
        session()->flash("status", "محصول با موفقیت ویرایش گردید");
        return back();
    }

    public function imageEditproductAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'user_id' => 'required',
            'thumbnail' => 'nullable|max:2048',
        ]);

        if ($validator->fails()) {
            session::flash("error", $validator->errors()->first());
            return back();
        }

//        $image = null;
//        if ($request->has('image')) {
//            $imagePath = "/uploads/products/";
//            $file = $request->file('image');
//            $image = $file->getClientOriginalName();
//            if (file_exists(public_path($imagePath) . $image)) {
//                $image = Carbon::now()->timestamp . $image;
//            }
//            $file->move(public_path($imagePath), $image);
//        }

        $thumbnail = null;
        if ($request->has('thumbnail')) {
            $imagePath = "/uploads/thumbnail/";
            $picture = $request->file('thumbnail');
            $thumbnail = $picture->getClientOriginalName();
            if (file_exists(public_path($imagePath) . $thumbnail)) {
                $thumbnail = Carbon::now()->timestamp . $thumbnail;
            }
            $picture->move(public_path($imagePath), $thumbnail);
        }

        Product::where('id', $request->id)->update([
            'user_id' => Auth::id(),
            'thumbnail' => $thumbnail,
//            "image" => $image,
            'updated_at' => Carbon::now(),
        ]);
        session()->flash("status", "عکس محصول با موفقیت ویرایش گردید");
        return back();
    }

    public function sliderEditproductAction(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'user_id' => 'required',
            'slider' => 'required',
            'slider.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:6048'
        ]);

        if ($validator->fails()) {
            session::flash("error", $validator->errors()->first());
            return back();
        }

        if ($request->hasfile('slider')) {
            $product = Product::where('id', $request->id)->first();
            foreach ($request->file('slider') as $image) {
                $slide = null;
                $imagePath = "/uploads/slider/";
                $picture = $image;
                $slide = $picture->getClientOriginalName();
                $names[] = $slide;
                if (file_exists(public_path($imagePath) . $slide)) {
                    $slide = Carbon::now()->timestamp . $slide;
                }
                $picture->move(public_path($imagePath), $slide);
            }


            //With old Product slider
            if (isset($product->slider) && isset($product->slider[0])) {
                $oldSlid = json_decode($product->slider);
                foreach ($names as $item) {
                    $oldSlid[] = $item;
                }
                $oldSlid = array_values($oldSlid);
                Product::where('id', $request->id)->update([
                    'slider' => $oldSlid,
                    'updated_at' => Carbon::now(),
                ]);
                session()->flash("status", "عکس محصول با موفقیت ویرایش گردید");
                return back();
            }

            //Without old Product slider
            Product::where('id', $request->id)->update([
                'slider' => $names,
                'updated_at' => Carbon::now(),
            ]);
            session()->flash("status", "عکس محصول با موفقیت ویرایش گردید");
            return back();
        } else {
            session()->flash("status", "فایلی برای ویرایش وجود ندارد!");
            return back();
        }
    }

    public function deleteSlider(Request $request)
    {

        $product = Product::where('id', $request->id)->first();
        $slider = json_decode($product->slider);

        foreach ($slider as $key => $value) {
            if ($key == $request->key) {

                unset ($slider[$key]);
                $slider = array_values($slider);
                Product::where('id', $request->id)->update([
                    'slider' => $slider,
                    'updated_at' => Carbon::now(),
                ]);
                return Response::json(["status" => "1", "desc" => " ویرایش با موفقیت انجام شد "]);
            }
        }
        return Response::json(["status" => "0", "desc" => " ویرایش دچار مشکل شده است! "]);
    }

    public function imageEditcategoryAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'user_id' => 'required',
            'image' => 'nullable|max:2048',
        ]);

        if ($validator->fails()) {
            session::flash("error", $validator->errors()->first());
            return back();
        }

        $image = null;
        if ($request->has('image')) {
            $imagePath = "/uploads/category/";
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            if (file_exists(public_path($imagePath) . $image)) {
                $image = Carbon::now()->timestamp . $image;
            }
            $file->move(public_path($imagePath), $image);
        }

        Category::where('id', $request->id)->update([
            "image" => $image,
        ]);
        session()->flash("status", "تصاویر دسته بندی با موفقیت ویرایش گردید");
        return back();
    }

    public function imageEdittagAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'user_id' => 'required',
            'image' => 'nullable|max:2048',
        ]);

        if ($validator->fails()) {
            session::flash("error", $validator->errors()->first());
            return back();
        }

        $image = null;
        if ($request->has('image')) {
            $imagePath = "/uploads/tag/";
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            if (file_exists(public_path($imagePath) . $image)) {
                $image = Carbon::now()->timestamp . $image;
            }
            $file->move(public_path($imagePath), $image);
        }

        Product_tag::where('id', $request->id)->update([
            "image" => $image,
        ]);
        session()->flash("status", "تصاویر دسته بندی با موفقیت ویرایش گردید");
        return back();
    }

    public function Festival(Request $request){
        $validator = Validator::make($request->all(), [
            'end_festival' => 'required',
        ]);
        if ($validator->fails()){
            Session::flash('errors', $validator->error()->first());
            return back();
        }
        if ($request->end_festival['2'] < 1 || $request->end_festival['2'] > 24){
            Session::flash('errors', "ساعت به درستی انتخاب نشده است");
            return back();
        }
        Setting::where('id', 1)->update([
            'end_festival' => $request->end_festival,
        ]);
        Session::flash('status', "تغییرات با موفقیت انجام شد");
        return back();
    }
}
